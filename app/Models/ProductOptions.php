<?php

namespace App\Models;
use App\Models\Products;

use Illuminate\Database\Eloquent\Model;

class ProductOptions extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'product_options';

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }


}
