<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ProductFaqs extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'product_faqs';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
