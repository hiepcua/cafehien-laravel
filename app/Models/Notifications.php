<?php

namespace App\Models;
use App\User;
use App\Models\Districts;
use App\Models\Wards;
use App\Models\NotificationTypes;
use App\Models\Provinces;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $table = 'notifications';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function type()
    {
        return $this->hasOne(NotificationTypes::class, 'id', 'notification_type_id');
    }

}
