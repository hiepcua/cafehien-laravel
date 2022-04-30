<?php

namespace App\Models;
use App\User;
use App\Models\Districts;
use App\Models\Wards;
use App\Models\Provinces;
use App\Models\OrderStatuses;
use App\Models\Deliveries;
use Illuminate\Database\Eloquent\Model;

class SalesOrder extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'sales_order';


    public function province()
    {
        return $this->hasOne(Provinces::class, 'id', 'province_id');
    }

    public function district()
    {
        return $this->hasOne(Districts::class, 'id', 'district_id');
    }

    public function ward()
    {
        return $this->hasOne(Wards::class, 'id', 'ward_id');
    }
    public function delivery()
    {
        return $this->hasOne(Deliveries::class, 'id', 'delivery_id');
    }

}
