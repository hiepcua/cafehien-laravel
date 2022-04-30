<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Models\Provinces;
use App\Models\Deliveries;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\ProductRatings;
use App\Models\ProductFaqs;
use App\Models\Categories;
use App\Models\ProductImages;
use App\Models\ProductOptions;
use App\Models\Warehouses;
use App\Models\WarehouseImports;
use App\Models\WarehouseImportDetails;
use App\Models\WarehouseExports;
use App\Models\WarehouseExportDetails;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WarehouseController extends Controller
{
    private $limit = 20;

    function warehousesImport(Request $request) {
        $productOption = ProductOptions::find($request->product_options_id);
        $productOption->quantity = $productOption->quantity + $request->quantity ;
        $productOption->save();

        $warehouses = new Warehouses();
        $warehouseImports = new WarehouseImports();
        $warehouseImportDetails = new WarehouseImportDetails();

        $warehouses->product_id = $productOption->product_id;
        $warehouses->quantity = $request->quantity;
        $warehouses->save();

        $warehouseImports->administrator_id = Auth::guard('admin')->user()->id;
        $warehouseImports->date = date("Y-m-d H:i:s");
        $warehouseImports->created_at = date("Y-m-d H:i:s");
        $warehouseImports->updated_at = date("Y-m-d H:i:s");
        $warehouseImports->save();

        $warehouseImportDetails->warehouse_import_id = $warehouseImports->id;
        $warehouseImportDetails->product_id = $productOption->product_id;
        $warehouseImportDetails->product_option_id = $request->product_options_id;
        $warehouseImportDetails->quantity = $request->quantity;
        $warehouseImportDetails->price = $productOption->price;
        $warehouseImportDetails->save();


        return response()->json(['message'=>"Nhập hàng thành công."]);
    }


    function historyImport(Request $request) {
        $menu_active = 'history-import';
        $dateTo = date("d/m/Y");
        return view(
            'admin.warehouses.list',
            compact([
                'menu_active',
                'dateTo'
            ])
        );

    }
    function historyImportList(Request $request) {
        $page = $request->page - 1;
        // $users = WarehouseImportDetails::orderBy("id" , "DESC")->with('product')->with('productOption')->with('warehouse');

        $users = WarehouseImportDetails::orderBy("warehouse_import_details.id" , "DESC")->leftJoin('warehouse_imports', 'warehouse_imports.id', '=', 'warehouse_import_details.warehouse_import_id');
        $users = $users->leftJoin('administrators', 'administrators.id', '=', 'warehouse_imports.administrator_id');
        $users = $users->leftJoin('products', 'products.id', '=', 'warehouse_import_details.product_id');
        $users = $users->leftJoin('product_options', 'product_options.id', '=', 'warehouse_import_details.product_option_id');
        $users = $users->select('warehouse_import_details.*', 'administrators.*', 'warehouse_imports.*','products.*','product_options.color','product_options.size');
        if(@$request->name != '' ){
            $users = $users->where('products.name', 'like', '%'.$request->name.'%');
        }
        if(@$request->dateTo != '' ){
            $request->dateTo = \DateTime::createFromFormat('d/m/Y', $request->dateTo);
            $request->dateTo =  $request->dateTo->format('Y-m-d');
            $users = $users->whereDate('warehouse_imports.date', '<=', $request->dateTo);
        }

        if(@$request->dateForm != '' ){
            $request->dateForm = \DateTime::createFromFormat('d/m/Y', $request->dateForm);
            $request->dateForm =  $request->dateForm->format('Y-m-d');
            $users = $users->whereDate('warehouse_imports.date', '>=', $request->dateForm);
        }
        // print_r($users);die;
        $count = $users->count();
        $pageTotal = ceil($count/$this->limit);
        $users = $users->offset($page * $this->limit)->limit($this->limit)->get();
        foreach ($users as &$item) {
            if ($item->date != '') {
                $item->date = date("d/m/Y H:i:s", strtotime($item->date) );
            }
        }
        unset($item);

        return response()->json(['data'=>$users,'count'=>$count,'pageTotal' => $pageTotal]);
    }
    
    function historyExport(Request $request) {
        $menu_active = 'history-export';
        $dateTo = date("d/m/Y");
        return view(
            'admin.warehouses.list-export',
            compact([
                'menu_active',
                'dateTo'
            ])
        );

    }

    function historyExportList(Request $request) {
        $page = $request->page - 1;
        // $users = WarehouseImportDetails::orderBy("id" , "DESC")->with('product')->with('productOption')->with('warehouse');

        $users = WarehouseExportDetails::orderBy("warehouse_export_details.id" , "DESC")->leftJoin('warehouse_exports', 'warehouse_exports.id', '=', 'warehouse_export_details.warehouse_export_id');
        $users = $users->leftJoin('products', 'products.id', '=', 'warehouse_export_details.product_id');
        $users = $users->leftJoin('product_options', 'product_options.id', '=', 'warehouse_export_details.product_option_id');
        $users = $users->select('warehouse_export_details.*', 'warehouse_exports.*', 'products.*','product_options.color','product_options.size');
        if(@$request->name != '' ){
            $users = $users->where('products.name', 'like', '%'.$request->name.'%');
        }
        if(@$request->dateTo != '' ){
            $request->dateTo = \DateTime::createFromFormat('d/m/Y', $request->dateTo);
            $request->dateTo =  $request->dateTo->format('Y-m-d');
            $users = $users->whereDate('warehouse_exports.date', '<=', $request->dateTo);
        }

        if(@$request->dateForm != '' ){
            $request->dateForm = \DateTime::createFromFormat('d/m/Y', $request->dateForm);
            $request->dateForm =  $request->dateForm->format('Y-m-d');
            $users = $users->whereDate('warehouse_exports.date', '>=', $request->dateForm);
        }
        // print_r($users);die;
        $count = $users->count();
        $pageTotal = ceil($count/$this->limit);
        $users = $users->offset($page * $this->limit)->limit($this->limit)->get();
        foreach ($users as &$item) {
            if ($item->date != '') {
                $item->date = date("d/m/Y H:i:s", strtotime($item->date) );
            }
        }
        unset($item);

        return response()->json(['data'=>$users,'count'=>$count,'pageTotal' => $pageTotal]);
    }


}
