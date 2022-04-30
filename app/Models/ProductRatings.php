<?php

namespace App\Models;
use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductRatingImages;

class ProductRatings extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'product_ratings';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function images()
    {
        return $this->hasOne(ProductRatingImages::class, 'product_rating_id', 'id');
    }

}
