<?php

namespace App\Http\Controllers\FE;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use App\User;
use App\Models\Products;
use App\Models\Posts;
use App\Models\Banners;
use App\Models\Contacts;

use DateTime;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    
    function index(Request $request){
        $message = '';
        $error = 0 ;
        if ($request->isMethod('post')) {
            $ratingNew = new Contacts();
            $ratingNew->name = $request->name;
            // $ratingNew->user_id = Auth::guard('web')->user()->id;
            $ratingNew->email = $request->email;
            $ratingNew->content = $request->content;
            $ratingNew->updated_at = date("Y-m-d H:i:s");
            $ratingNew->created_at = date("Y-m-d H:i:s");
            $ratingNew->save();
            $message = 'Cảm Ơn Bạn Đã Gửi Liên Hệ Cho Chúng Tôi.';
            $error = 1 ;
        }
        return view(
            'fe.contact.index',
            compact([
            'error',
            'message'
            ])
        );
    }

}
