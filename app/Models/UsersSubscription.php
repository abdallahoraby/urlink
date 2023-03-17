<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UsersSubscription extends Model
{
    use SoftDeletes;
    protected $table = "users_subscriptions";
    
    protected $primaryKey = "subscription_id";

    protected $fillable = [
        'subscription_start_date',
        'subscription_end_date',
        'subscription_status',
        'subscription_amount',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id')->withTrashed();
    }
}
