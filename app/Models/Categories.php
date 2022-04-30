<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'categories';

    public function parent()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

}
