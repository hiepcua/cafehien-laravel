<?php

namespace App\Models;
use App\User;
use App\Models\Districts;
use App\Models\Wards;
use App\Models\Provinces;
use App\Models\OrderStatuses;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'addresses';


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

}
