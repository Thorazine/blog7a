<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    /**
     * Load all images
     * @return Class this
     */
    public function image()
    {
        return $this->hasOne('App\Image');
    }
}
