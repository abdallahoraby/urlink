<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LandingPageSection extends Model
{
    use SoftDeletes;
    protected $table = "landing_page_sections";
    
    protected $primaryKey = "section_id";

    protected $fillable = [
        'section_type',
        'display_order',
        'section_title',
        'section_content',
        'youtube_url',
        'vimeo_url',
        'image_url',
        'soundcloud_url',
        'map_location',
        'page_id'
    ];

    public function page()
    {
        return $this->belongsTo(LandingPage::class, 'landing_page_id', 'page_id');
    }

    public function images(){
        return $this->hasMany(SliderImage::class, 'section_id', 'section_id');
    }
}
