<?php

namespace App\Models;
use App\User;
use App\Models\Admin;
use App\Models\Products;
use Illuminate\Database\Eloquent\Model;

class WarehouseImports extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'warehouse_imports';

    public function admin()
    {
        return $this->hasOne(Admin::class, 'id', 'administrator_id');
    }

}
