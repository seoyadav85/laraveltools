<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RecordingModel.
 */
class Categories extends Model
{
    protected $table = 'categories';

    public function tools()
    {
        return $this->hasMany('App\Models\Tools','category_id');
    }

}