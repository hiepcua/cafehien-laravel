<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotions extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'promotions';
}
