<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trademarks extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'trademarks';
}
