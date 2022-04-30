<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderStatuses;
use App\Models\OrderDetails;
use App\Models\Notifications;
use App\Models\NotificationTypes;

use App\Models\Posts;
use App\User;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductRatings;
use App\Models\ProductFaqs;
use App\Models\Categories;
use App\Models\ProductImages;
use App\Models\ProductOptions;
use App\Models\Addresses;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\Deliveries;
use App\Models\Provinces;
use App\Models\Promotions;
use DateTime;
use App\Http\Controllers\Controller;

use App\Models\Warehouses;
use App\Models\WarehouseImports;
use App\Models\WarehouseImportDetails;
use App\Models\WarehouseExports;
use App\Models\WarehouseExportDetails;

class UserController extends Controller
{
    public function dashboard(Request $request){
        
        if(!Auth::guard('web')->user()) {
            return redirect('/dang-nhap?callback=/thanh-vien/thong-ke');
        }
        $message = [
            "message" => "",
            "status" => 0
        ];
        $user = User::with('level')->find(Auth::guard('web')->user()->id);
        $countProduct = Products::where('is_active','1')->count();
        $countOrderOnline = Orders::where('user_code',Auth::guard('web')->user()->code)->count();
        $countOrderDelivering = Orders::join('order_statuses','orders.id','=','order_statuses.order_id')
        ->where('order_statuses.status',1)->where('orders.user_code',Auth::guard('web')->user()->code)->count();
        $countOrderDelivered = Orders::join('order_statuses','orders.id','=','order_statuses.order_id')
        ->where('order_statuses.status',2)->where('orders.user_code',Auth::guard('web')->user()->code)->count();
        $countOrderCompleted = Orders::join('order_statuses','orders.id','=','order_statuses.order_id')
        ->where('order_statuses.status',3)->where('orders.user_code',Auth::guard('web')->user()->code)->count();
        $countOrderCancel = Orders::join('order_statuses','orders.id','=','order_statuses.order_id')
        ->where('order_statuses.status',4)->where('orders.user_code',Auth::guard('web')->user()->code)->count();

        $news = Posts::orderBy("id" , "DESC")->where('category_id',1)->where('is_active','1')->paginate(12);

        $priceOrderCompleted = Orders::join('order_statuses','orders.id','=','order_statuses.order_id')
        ->where('order_statuses.status',3)->where('orders.user_code',Auth::guard('web')->user()->code)->get();

        foreach ($news as &$item) {
            $item['created_at'] = date('d-m-Y',strtotime($item['created_at']));
        }
        unset($item);
        $priceTotal = 0;
        foreach ($priceOrderCompleted as $item) {
            $priceTotal += $item->total;
        }
        
        $menu_active = 'dashboard';
        return view(
            'fe.user.dashboard',
            compact([
                'countProduct',
                'priceTotal',
                'menu_active',
                'message',
                'news',
                'countOrderDelivering',
                'countOrderDelivered',
                'countOrderCompleted',
                'countOrderCancel',
                'countOrderOnline'
            ])
        );

    }
    public function profile(Request $request){
        
        if(!Auth::guard('web')->user()) {
            return redirect('/dang-nhap?callback=/thanh-vien/profile');
        }

        $message = [
            "message" => "",
            "status" => 0
        ];

        $user = User::with('level')->find(Auth::guard('web')->user()->id);
        $listProvinces = Provinces::all();
        if (!$user) {
            return view('authentication.error404');
        }
        if ($request->isMethod('post')) {
            if($request->hasFile('files')) {
                $allowedfileExtension=['jpg','png'];
                $files = $request->file('files');
                // flag xem có thực hiện lưu DB không. Mặc định là có
                $exe_flg = true;

                $target_dir = env('APP_URL_POST_FILE', 'public/uploads/avatar/');
                $countFile = 0; 
                // kiểm tra tất cả các files xem có đuôi mở rộng đúng không
                foreach($files as $file) {
                    if ($countFile < 1) {
                        $countFile ++ ;
                        $extension = $file->getClientOriginalExtension();
                        $target_file = $target_dir . Auth::guard('web')->user()->id . time() . basename($file->getClientOriginalName());
                        
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Check if image file is a actual image or fake image
                        $check = getimagesize($file->getPathName());
                        if($check !== false) {
                            $uploadOk = 1;
                        } else {
                            $message = [
                                "message" => "Avatar phải là hình ảnh.",
                                "status" => 2
                            ];
                            $uploadOk = 0;
                        }
                        if ( $uploadOk == 1) {
                            if (move_uploaded_file($file->getPathName(), $target_file)) {
                                $user->avatar = '/'.$target_file;
                                $user->save();
                            } else {
                                $message = [
                                    "message" => "Xin lỗi, đã xảy ra lỗi khi tải tệp của bạn lên.",
                                    "status" => 2
                                ];
                                echo "Sorry, there was an error uploading your file.";
                            }
                        }
                    }
                    
                    
                } 
            }
            $user->name = $request->name;
            if ($request->birthday != '') {
                $request->birthday = \DateTime::createFromFormat('d/m/Y', $request->birthday);
                $user->birthday =  $request->birthday->format('Y-m-d');
            }
            $user->address = $request->address;
            $user->province_id = $request->province_id;
            $user->district_id = $request->district_id;
            $user->ward_id = $request->ward_id;
            $user->save();
            $message = [
                "message" => "Thay đổi thông tin thành công.",
                "status" => 1
            ];
        }
        
        if ( $user->birthday != '') {
            $user->birthday = date("d/m/Y", strtotime($user->birthday) );
        }


        $menu_active = 'profile';
        return view(
            'fe.user.profile',
            compact([
                'listProvinces',
                'user',
                'menu_active',
                'message'
            ])
        );

    }

    public function password(Request $request){
        
        if(!Auth::guard('web')->user()) {
            return redirect('/dang-nhap?callback=/thanh-vien/password');
        }
        $message = [
            "message" => "",
            "status" => 0
        ];

        $user = User::with('level')->find(Auth::guard('web')->user()->id);
        if ($request->isMethod('post')) {
            if ($request->old_password == '') {
                $message = [
                    "message" => "Nhập mật khẩu cũ.",
                    "status" => 2
                ];
            } elseif (strlen($request->new_password) < 6) {
                $message = [
                    "message" => "Mật khẩu mới phải lớn hơn 6 ký tự.",
                    "status" => 2
                ];
            } elseif ($request->new_password != $request->renew_password) {
                $message = [
                    "message" => "Mật khẩu mới và mật khẩu cũ không trùng khớp.",
                    "status" => 2
                ];
            }
            if(!Hash::check($request->old_password, Auth::guard('web')->user()->password)) {
                $message = [
                    "message" => "Mật khẩu cũ không trùng khớp.",
                    "status" => 2
                ];
            }

            if ($message['status'] == 0 ) {
                $user->password = Hash::make($request->new_password);
                $user->save();
                $message = [
                    "message" => "Thay đổi mật khẩu thành công.",
                    "status" => 1
                ];
            }


        }
        $menu_active = 'password';
        return view(
            'fe.user.password',
            compact([
                'menu_active',
                'message'
            ])
        );

    }
    public function notify(Request $request){
        
        if(!Auth::guard('web')->user()) {
            return redirect('/dang-nhap?callback=/thanh-vien/notify');
        }
        $message = [
            "message" => "",
            "status" => 0
        ];

        $user = User::with('level')->find(Auth::guard('web')->user()->id);
        $notifyList = Notifications::orderBy("is_read")->with('type')->orderBy("id" , "DESC")->where('user_id',Auth::guard('web')->user()->id)->paginate(20);
        foreach ($notifyList as &$item) {
            $orderDetail = Orders::find($item->data_id);
            $item->type->message = str_replace("{{code}}",@$orderDetail->qr_code,$item->type->message);
            if ( $item->created_at != '') {
                $item->created_at = date("d/m/Y H:i:s", strtotime($item->created_at) );
            }
            $item->load = $item->is_read;
            $noti = Notifications::find($item->id);
            $noti->is_read = 1;
            $noti->save();
        }
        unset($item);
        
        $menu_active = 'notify';
        return view(
            'fe.user.notify',
            compact([
                'menu_active',
                'message',
                'notifyList'
            ])
        );

    }
    function updateStatus(Request $request,$id) {

        $user = User::with('level')->find(Auth::guard('web')->user()->id);
        
        


        $data = OrderStatuses::where('order_id','=',$id)->first();
        $data->status = $request->status;
        $data->reason = $request->reason;
        $data->save();

        $order = Orders::where('id','=',$id)->first();
        
        if(!$order || @$order->user_code != Auth::guard('web')->user()->code){
            return response()->json(['message'=>"Update Trạng Thái Không Thành Công."]);
        }


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
    
    public function cartDetail(Request $request, $id){
        
        if(!Auth::guard('web')->user()) {
            return redirect('/dang-nhap?callback=/thanh-vien/cart');
        }
        $message = [
            "message" => "",
            "status" => 0
        ];

        $user = User::with('level')->find(Auth::guard('web')->user()->id);
        
        $data = Orders::orderBy("id" , "DESC")->with('user')->with('province')->with('district')->with('ward')->with('delivery')->with('OrderStatuses');
        $data = $data->where('id','=',$id)->first();
        if(!$data || @$data->user_code != Auth::guard('web')->user()->code){
            return redirect('thanh-vien/cart');
        }
        $dataStatus = OrderStatuses::where('order_id','=',$id)->first();
        $dataDetail = OrderDetails::where('order_id','=',$id)->with('product')->with('productOption')->get();
        $data->created_at = date("d/m/Y H:i:s", strtotime($data->created_at) );
        $dataStatus->status_convert = $this->convertStatus($dataStatus->status);

        $menu_active = 'cart';
        return view(
            'fe.user.cart-detail',
            compact([
                'menu_active',
                'message',
                'data',
                'dataStatus',
                'dataDetail',
                'id'
            ])
        );

    }
    public function cart(Request $request){
        
        if(!Auth::guard('web')->user()) {
            return redirect('/dang-nhap?callback=/thanh-vien/cart');
        }
        $message = [
            "message" => "",
            "status" => 0
        ];

        $user = User::with('level')->find(Auth::guard('web')->user()->id);
        
        $data = Orders::orderBy("id" , "DESC")->with('user')->with('province')->with('district')->with('ward')->with('OrderStatuses');
        $data = $data->where('user_code',Auth::guard('web')->user()->code)->paginate(20);
        foreach ($data as &$item) {
            if ($item->created_at != '') {
                $item->created_at = date("d/m/Y H:i:s", strtotime($item->created_at) );
            }
            $item->OrderStatuses->statusName = $this->convertStatus($item->OrderStatuses->status);
        }
        unset($item);
        $orders = $data;
        $menu_active = 'cart';
        return view(
            'fe.user.cart',
            compact([
                'menu_active',
                'message',
                'orders'
            ])
        );

    }
    public function listAddress(Request $request){
        if(!Auth::guard('web')->user()) {
            return response()->json(['data'=> [] , 'errors' => 1]);
        }
        $allAddress = Addresses::where('user_id',Auth::guard('web')->user()->id)->with('ward')->with('district')->with('province')->get();
        return response()->json(['data'=>$allAddress , 'errors' => 0]);
    }
    public function setDefault(Request $request, $id){
        if(!Auth::guard('web')->user()) {
            return response()->json(['data'=> [] , 'errors' => 1]);
        }

        $allAddress = Addresses::where('user_id',Auth::guard('web')->user()->id)->where('id',$id)->with('ward')->with('district')->with('province')->first();
        if(!$allAddress) {
            return response()->json(['data'=> [] , 'errors' => 1]);
        }
        $allAddressOld = Addresses::where('user_id',Auth::guard('web')->user()->id)->where('is_default',1)->with('ward')->with('district')->with('province')->first();
        $allAddressOld->is_default = 0;
        $allAddressOld->save();
        $allAddress->is_default = 1;
        $allAddress->save();
        return response()->json(['data'=>$allAddress , 'errors' => 0]);
    }
    public function updateAddress(Request $request, $id){
        if(!Auth::guard('web')->user()) {
            return response()->json(['data'=> [] , 'errors' => 1]);
        }

        $allAddress = Addresses::where('user_id',Auth::guard('web')->user()->id)->where('id',$id)->with('ward')->with('district')->with('province')->first();
        if(!$allAddress) {
            return response()->json(['data'=> [] , 'errors' => 1]);
        }
        
        $allAddress->province_id = $request->province_id;
        $allAddress->district_id = $request->district_id;
        $allAddress->ward_id = $request->ward_id;
        $allAddress->name = $request->name;
        $allAddress->phone = $request->phone;
        $allAddress->address = $request->address;
        $allAddress->save();
        return response()->json(['data'=>$allAddress , 'errors' => 0]);
    }
    
    public function address(Request $request){
        
        if(!Auth::guard('web')->user()) {
            return redirect('/dang-nhap?callback=/thanh-vien/address');
        }
        $message = [
            "message" => "",
            "status" => 0
        ];

        $user = User::with('level')->find(Auth::guard('web')->user()->id);
        
        $listProvinces = Provinces::all();
        $menu_active = 'address';
        return view(
            'fe.user.address',
            compact([
                'menu_active',
                'listProvinces',
                'message'
            ])
        );

    }
    
}
