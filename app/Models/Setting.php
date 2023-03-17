<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use SoftDeletes;
    protected $table = "settings";

    protected $primaryKey = "setting_id";

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $fillable = [
        'key',
        'value',
        'type'
    ];
}
