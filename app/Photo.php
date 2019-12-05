<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    protected $uploads = '/images/';
    protected $fillable = [
        'file',
    ];

    //accessor method untuk menambahkan dir images ke photo yang akan di show
    public function getFileAttribute($photo)
    {
        return $this->uploads . $photo;
    }
}
