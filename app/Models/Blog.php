<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Blog extends Eloquent
{

    use Sluggable;

    protected $connection = 'mongodb';

    protected $collection = 'blogs';

    protected $fillable = [
        'title', 'description', 'slug'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
