<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class LandingPageLink extends Model
{
    use SoftDeletes;
    protected $table = "landing_page_links";
    
    protected $primaryKey = "link_id";

    protected $fillable = [
        'link_type',
        'link_name',
        'link_url',
        'page_id'
    ];

    public function page()
    {
        return $this->belongsTo(LandingPage::class, 'landing_page_id', 'page_id');
    }
}
