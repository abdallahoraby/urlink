<?php

namespace App\Models;

use Shetabit\Visitor\Traits\Visitable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LandingPage extends Model
{

    use Visitable;
    use SoftDeletes;
    protected $table = "landing_pages";

    protected $primaryKey = "landing_page_id";

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'page_name',
        'page_title',
        'page_profile_icon',
        'page_profile_banner',
        'page_contact_email',
        'page_contact_phone',
        'page_brief',
        'page_desc',
        'page_country',
        'page_city',
        'page_hits',
        'page_status',
        'page_account_type',
        'page_url',
        'user_id',
        'style_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id')->withTrashed();
    }

    public function links(){
        return $this->hasMany(LandingPageLink::class, 'page_id', 'landing_page_id');
    }

    public function sections(){
        return $this->hasMany(LandingPageSection::class, 'page_id', 'landing_page_id')->with('images');
    }

    public function style()
    {
        return $this->belongsTo('App\Models\LandingStyle', 'style_id')->withTrashed();
    }
}
