<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componant extends Model
{
    protected $table = 'componant';

    protected $fillable = [
        'product_id', 'name','unit'
    ];

    public $timestamps = true;
}
