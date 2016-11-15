<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'title',
        'author',
        'body',
        'is_published',
        'category_id',
    ];
}
