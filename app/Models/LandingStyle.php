<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandingStyle extends Model
{
    use SoftDeletes;
    protected $table = "landing_styles";

    protected $primaryKey = "style_id";

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'style_name',
        'style_image',
        'style_default',
        'style_fee',
        'status'
    ];

    public function landingPages()
    {
        return $this->hasMany('App\Models\LandingPage');
    }
}
