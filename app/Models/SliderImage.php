<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class SliderImage extends Model
{
    use SoftDeletes;
    protected $table = "slider_images";
    
    protected $primaryKey = "slide_image_id";

    protected $fillable = [
        'image_url',
        'section_id'
    ];

    public function section()
    {
        return $this->belongsTo(LandingPageSection::class, 'section_id', 'section_id');
    }
}
