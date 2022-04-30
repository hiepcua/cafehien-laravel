<?php

namespace App\Models;
use App\Models\Categories;
use App\Models\Origins;
use App\Models\Trademarks;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'products';

    public function parent()
    {
        return $this->hasOne(Categories::class, 'id', 'category_id');
    }

    public function origins()
    {
        return $this->hasOne(Origins::class, 'id', 'origin_id');
    }

    public function trademarks()
    {
        return $this->hasOne(Trademarks::class, 'id', 'trademark_id');
    }
}
