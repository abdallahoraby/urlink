<?php

namespace App\Models;

/* use Shetabit\Visitor\Traits\Visitable; */

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\SoftDeletes;
use Bpuig\Subby\Traits\HasSubscriptions;


class User extends Authenticatable implements JWTSubject
{
    //use Visitable;
    use Notifiable;
    use SoftDeletes;
    use HasSubscriptions;

    protected $table = "users";

    protected $primaryKey = "user_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name', 'email', 'password', 'avatar', 'first_name', 'last_name', 'mobile', 'subscription', 'isAdmin', 'should_re_login'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        /**
         * 
         *
         * @return response()
         */
        static::created(function ($user) {
            $user->user_id = $user->id;
        });
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id')->withTrashed();
    }

    public function user_messages()
    {

        return $this->hasMany('App\Models\ContactUs');
    }
}
