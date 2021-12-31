<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'aboutus';

    protected $fillable = [
        'id', 'title','content', 'images',
    ];

    public $timestamps = true;
}
