<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\User;
use App\Models\Products;
use App\Models\Posts;


use DateTime;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    

    function CurrentWeek (){
        $d = strtotime("today");
        $start_week = strtotime("last sunday midnight",$d);
        $end_week = strtotime("next saturday",$d);
        $start = date("Y-m-d",$start_week); 
        $end = date("Y-m-d",$end_week); 
        return [$start,$end ];
    }
    function LastWeek (){
        $d = strtotime("-1 week");
        $start_week = strtotime("last sunday midnight",$d);
        $end_week = strtotime("next saturday",$d);
        $start = date("Y-m-d",$start_week); 
        $end = date("Y-m-d",$end_week); 
        return [$start,$end ];
    }
      

    function index(Request $request)                        {
        $menu_active = 'dashboard';

        $valCondition = 0 ;
        $strCondition = $this->convertCondition($valCondition);

        if ($request->isMethod('post')) {
            
            $valCondition = $request->condition;
            $strCondition = $this->convertCondition($valCondition);

        }

        if ($valCondition == 0) {
            $week_array = $this->CurrentWeek();
            $data = new Orders();
            $week_array[1] = \DateTime::createFromFormat('Y-m-d', $week_array[1]);
            $week_array[1] =  $week_array[1]->format('Y-m-d');
            $data = $data->whereDate('created_at', '<=', $week_array[1]);

            $week_array[0] = \DateTime::createFromFormat('Y-m-d', $week_array[0]);
            $week_array[0] =  $week_array[0]->format('Y-m-d');
            $data = $data->whereDate('created_at', '>=', $week_array[0]);
            
            $count = $data->count();
            $data = $data->get();
        } else if ($valCondition == 1) {
            $week_array = $this->LastWeek();
            $data = new Orders();

            $week_array[1] = \DateTime::createFromFormat('Y-m-d', $week_array[1]);
            $week_array[1] =  $week_array[1]->format('Y-m-d');
            $data = $data->whereDate('created_at', '<=', $week_array[1]);

            $week_array[0] = \DateTime::createFromFormat('Y-m-d', $week_array[0]);
            $week_array[0] =  $week_array[0]->format('Y-m-d');
            $data = $data->whereDate('created_at', '>=', $week_array[0]);
            
            $count = $data->count();
            $data = $data->get();
           
        } else if ($valCondition == 2) {
            $data = new Orders();
            $month = date('m');
            $data = $data->whereMonth('created_at', '=', $month);
            $count = $data->count();
            $data = $data->get();
        } else if ($valCondition == 3) {
            $data = new Orders();
            $month = date("m",strtotime("-1 month"));
            $data = $data->whereMonth('created_at', '=', $month);
            $count = $data->count();
            $data = $data->get();
        }  else if ($valCondition == 4) {
            $data = new Orders();
            $year = date("Y");
            $data = $data->whereYear('created_at', '=', $year);
            $count = $data->count();
            $data = $data->get();
        }  else if ($valCondition == 5) {
            $data = new Orders();
            $year = date("Y",strtotime("-1 year"));
            $data = $data->whereYear('created_at', '=', $year);
            $count = $data->count();
            $data = $data->get();
        } 

        $dataUser = User::count();
        $dataOrders = Orders::count();
        $dataPost = Posts::count();
        $dataProducts = Products::count();
        
        $menu_parent_active = 'setting-groups';
        return view(
            'admin.dashboard.index',
            compact([
                'menu_active',
                'strCondition',
                'valCondition',
                'count',
                'dataUser',
                'dataPost',
                'dataOrders',
                'data',
                'dataProducts',
                'menu_parent_active'
            ])
        );
    }
    function convertCondition( $str ) {
        if($str == 0){
            return "Tuần Này";
        } else if($str == 1){
            return "Tuần Trước";
        } else if($str == 2){
            return "Tháng Này";
        } else if($str == 3){
            return "Tháng Trước";
        } else if($str == 4){
            return "Năm Nay";
        } else if($str == 5){
            return "Năm Trước";
        }

    }
    function cryptocurrency()               {return view('admin.dashboard.cryptocurrency');}
    function campaign()                     {return view('admin.dashboard.campaign');}
    function ecommerce()                    {return view('admin.dashboard.ecommerce');}
}
