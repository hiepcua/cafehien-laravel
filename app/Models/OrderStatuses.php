<?php

namespace App\Models;
use App\Models\Orders;

use Illuminate\Database\Eloquent\Model;

class OrderStatuses extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'order_statuses';

    public function order()
    {
        return $this->hasOne(Orders::class, 'id', 'order_id');
    }


}
