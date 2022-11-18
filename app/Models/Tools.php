<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RecordingModel.
 */
class Tools extends Model
{
    protected $table = 'tools';

    public function category()
    {
        return $this->belongsTo('App\Models\Categories','category_id');
    }
}