<?php

namespace App\Models;
use App\Models\PostCategories;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'posts';

    public function parent()
    {
        return $this->hasOne(PostCategories::class, 'id', 'category_id');
    }
}
