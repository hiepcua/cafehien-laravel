<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Contacts extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'contacts';

}
