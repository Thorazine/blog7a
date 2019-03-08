<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function bla()
    {
        dd('blahaaaa');
    }


    public function getUrlAttribute()
    {
        if(! $this->filename) {
            return asset('storage/'.$this->filename.'.'.$this->extension);
        }
        return asset('storage/not_found.png');
    }
}
