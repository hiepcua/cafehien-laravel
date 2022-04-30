<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advertisements extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'advertisements';
}
