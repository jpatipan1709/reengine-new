<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'Banners';

    protected $fillable = [
        'id', 'title','content', 'images',
    ];

    public $timestamps = true;
}
