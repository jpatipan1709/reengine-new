<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $table = 'material';

    protected $fillable = [
        'name', 'product_id','componant_id', 'width','leght','thickness','qty','unit'
    ];

    public $timestamps = true;
}
