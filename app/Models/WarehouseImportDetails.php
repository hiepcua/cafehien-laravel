<?php

namespace App\Models;
use App\User;
use App\Models\WarehouseImports;
use App\Models\ProductOptions;
use App\Models\Products;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

class WarehouseImportDetails extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'warehouse_import_details';

    public function warehouse()
    {
        return $this->hasMany(WarehouseImports::class, 'id', 'warehouse_import_id');
    }
    public function productOption()
    {
        return $this->hasMany(ProductOptions::class, 'id', 'product_option_id');
    }
    public function product()
    {
        return $this->hasMany(Products::class, 'id', 'product_id');
    }

}
