<?php

namespace App\Models;
use App\Models\PartnerStyle;
use App\Models\Provinces;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'partner';

    public function parent()
    {
        return $this->hasOne(PartnerStyle::class, 'id', 'partner_style');
    }
    public function province()
    {
        return $this->hasOne(Provinces::class, 'id', 'province_id');
    }
}
