<?php

namespace App\Models;
use App\User;
use App\Models\Districts;
use App\Models\Wards;
use App\Models\Provinces;
use App\Models\OrderStatuses;
use App\Models\Deliveries;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'orders';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function buy()
    {
        return $this->hasOne(User::class, 'code', 'user_code');
    }

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

    public function OrderStatuses()
    {
        return $this->hasOne(OrderStatuses::class, 'order_id', 'id');
    }

    public function delivery()
    {
        return $this->hasOne(Deliveries::class, 'id', 'delivery_id');
    }

}
