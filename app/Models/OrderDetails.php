<?php

namespace App\Models;
use App\Models\Orders;
use App\Models\Products;
use App\Models\ProductOptions;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'order_details';

    public function order()
    {
        return $this->hasOne(Orders::class, 'id', 'order_id');
    }

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }


    public function productOption()
    {
        return $this->hasOne(ProductOptions::class, 'id', 'product_option_id');
    }


}
