<?php

namespace App\Models;
use App\User;
use App\Models\Orders;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class WarehouseExports extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'warehouse_exports';

    public function order()
    {
        return $this->hasOne(Orders::class, 'id', 'order_id');
    }

}
