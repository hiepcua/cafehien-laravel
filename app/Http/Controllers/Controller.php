<?php

namespace App\Http\Controllers;
use App\Helpers\Helper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function convertStatus ($str) {
        if ($str == 0) {
            $str = 'Đợi Duyệt';
        } elseif ($str == 1) {
            $str = 'Đang Giao Hàng';
        } elseif ($str == 2) {
            $str = 'Đã Giao Hàng';
        } elseif ($str == 3) {
            $str = 'Hoàn Thành';
        } elseif ($str == 4) {
            $str = 'Hủy';
        }
        return $str;
    }
}
