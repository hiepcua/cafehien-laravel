<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostCategories extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'post_categories';


}
