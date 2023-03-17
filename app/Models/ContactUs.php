<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class ContactUs extends Model
{
    use SoftDeletes;
    protected $table = "contact_us";
    
    protected $primaryKey = "message_id";

    protected $fillable = [
        'sender_name',
        'sender_email',
        'message',
        'is_new',
        'ip_address',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id')->withTrashed();
    }


}
