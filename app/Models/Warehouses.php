<?php

namespace App\Models;
use App\User;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class Warehouses extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'warehouses';

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }

}
