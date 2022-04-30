<?php

namespace App\Models;
use App\User;
use App\Models\WarehouseExports;
use App\Models\ProductOptions;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class WarehouseExportDetails extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'warehouse_export_details';

    public function warehouse()
    {
        return $this->hasOne(WarehouseExports::class, 'id', 'warehouse_export_id');
    }
    public function productOption()
    {
        return $this->hasOne(ProductOptions::class, 'id', 'product_option_id');
    }

}
