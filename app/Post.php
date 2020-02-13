<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

/*
Install Package https://github.com/cviebrock/eloquent-sluggable
 composer require cviebrock/eloquent-sluggable:^4.8.*
 php artisan vendor:publish --provider="Cviebrock\EloquentSluggable\ServiceProvider"

*/

class Post extends Model
{
    //
    use Sluggable;
    use SluggableScopeHelpers;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }

    protected $fillable = [
        'title',
        'body',
        'category_id',
        'photo_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function photoPlaceholder()
    {
        return "http://placehold.it/700x200";
    }
}
