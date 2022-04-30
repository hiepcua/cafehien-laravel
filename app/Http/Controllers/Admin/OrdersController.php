<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\OrderDetails;
use App\Models\OrderStatuses;
use App\Models\Notifications;
use App\Models\Orders;
use App\Models\Products;
use App\Models\ProductOptions;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Warehouses;
use App\Models\WarehouseImports;
use App\Models\WarehouseImportDetails;
use App\Models\WarehouseExports;
use App\Models\WarehouseExportDetails;

class OrdersController extends Controller
{
    private $limit = 20;
    function list(Request $request) {
        $menu_active = 'orders';
        $dateTo = date("d/m/Y");
        return view(
            'admin.orders.list',
            compact([
                'menu_active',
                'dateTo'
            ])
        );

    }
    
    function getList(Request $request) {
        $page = $request->page - 1;
        $data = Orders::orderBy("id" , "DESC")->with('user')->with('province')->with('district')->with('ward')->with('OrderStatuses');
        if(@$request->name != '' ){
            $data = $data->where('name', 'like', '%'.$request->name.'%')->orWhere('id', 'like', '%'.$request->name.'%');
        }
        if(@$request->dateTo != '' ){
            $request->dateTo = \DateTime::createFromFormat('d/m/Y', $request->dateTo);
            $request->dateTo =  $request->dateTo->format('Y-m-d');
            $data = $data->whereDate('created_at', '<=', $request->dateTo);
        }

        if(@$request->dateForm != '' ){
            $request->dateForm = \DateTime::createFromFormat('d/m/Y', $request->dateForm);
            $request->dateForm =  $request->dateForm->format('Y-m-d');
            $data = $data->whereDate('created_at', '>=', $request->dateForm);
        }
        
        $count = $data->count();
        $pageTotal = ceil($count/$this->limit);
        $data = $data->offset($page * $this->limit)->limit($this->limit)->get();

        foreach ($data as &$item) {
            if ($item->created_at != '') {
                $item->created_at = date("d/m/Y H:i:s", strtotime($item->created_at) );
            }
            $item->OrderStatuses->status = $this->convertStatus($item->OrderStatuses->status);
            if ($item->user_code != ''){
                $item['buy'] = User::where('code',$item->user_code)->first();
            } else {
                $item['buy'] = '';
            }
        }
        unset($item);

        return response()->json(['data'=>$data,'count'=>$count,'pageTotal' => $pageTotal]);
    }

    function edit(Request $request,$id) {
        $checkUpdate = 0;
        $checkStatus = 0;
        if ($request->isMethod('post')) {
            $data = Orders::orderBy("id" , "DESC")->where('id','=',$id)->first();
            $data->user_code = $request->user_code;
            $data->save();
            $checkUpdate = 1;
            $checkStatus = $request->user_code;
        }
        $data = Orders::orderBy("id" , "DESC")->with('user')->with('province')->with('district')->with('ward')->with('delivery')->with('OrderStatuses');
        $data = $data->where('id','=',$id)->first();
        $dataStatus = OrderStatuses::where('order_id','=',$id)->first();
        $dataDetail = OrderDetails::where('order_id','=',$id)->with('product')->with('productOption')->get();
        $menu_active = 'orders';
        $data->created_at = date("d/m/Y H:i:s", strtotime($data->created_at) );
        $dataStatus->status_convert = $this->convertStatus($dataStatus->status);
        
        $users = User::where('code', '!=','')->get();
        return view(
            'admin.orders.edit',
            compact([
                'checkStatus',
                'checkUpdate',
                'users',
                'menu_active',
                'data',
                'dataStatus',
                'dataDetail',
                'id'
            ])
        );
    }
    function updateStatus(Request $request,$id) {
        $data = OrderStatuses::where('order_id','=',$id)->first();
        $data->status = $request->status;
        $data->reason = $request->reason;
        $data->save();

        $order = Orders::where('id','=',$id)->first();

        if ($request->status != 3) {
            $noti = new Notifications();
            $noti->user_id = $order->user_id;
            $noti->notification_type_id = $request->status;
            $noti->is_read = 0;
            $noti->data_id =  $order->id;
            $noti->created_at = date("Y-m-d H:i:s");
            $noti->save();
            
        } else {
            $noti = new Notifications();
            $noti->user_id = $order->user_id;
            $noti->notification_type_id = $request->status;
            $noti->is_read = 0;
            $noti->data_id = $order->id;
            $noti->created_at = date("Y-m-d H:i:s");
            $noti->save();

            $dataDetail = OrderDetails::where('order_id','=',$id)->with('product')->with('productOption')->get();
            foreach ($dataDetail as $key => $value) {

                $optionDetail = ProductOptions::find($value->product_option_id);
                $optionDetail->quantity = $optionDetail->quantity - $value->quantity;
                $optionDetail->save();

                $warehouses = new Warehouses();
                $warehouses->product_id = $value->product_id;
                $warehouses->quantity = $value->quantity;
                $warehouses->save();

                $warehouseExports = new WarehouseExports();
                $warehouseExports->order_id = $id;
                $warehouseExports->date = date("Y-m-d H:i:s");
                $warehouseExports->created_at = date("Y-m-d H:i:s");
                $warehouseExports->save();

                $warehouseExportDetails = new WarehouseExportDetails();
                $warehouseExportDetails->warehouse_export_id = $warehouseExports->id;
                $warehouseExportDetails->product_id = $value->product_id;
                $warehouseExportDetails->product_option_id = $value->product_option_id;
                $warehouseExportDetails->quantity = $value->quantity;
                $warehouseExportDetails->price = $value->price;
                $warehouseExportDetails->save();
                
            }

        }
        return response()->json(['message'=>"Update Trạng Thái Thành Công."]);
    }

    function addData(Request $request) {
        
        $data = new Deliveries();
        $data->delivery = $request->delivery;
        $data->time = $request->time;
        $data->price = $request->price;
        $data->save();
        return response()->json(['data'=>$data]);
    }

    function delete(Request $request,$id) {
        $data = Deliveries::find($id);
        $data->delete();
        return response()->json(['message'=>"Xóa Danh Mục Thành Công."]);
    }

}
