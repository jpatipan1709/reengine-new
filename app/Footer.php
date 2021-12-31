<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Footer extends Model
{
    protected $table = 'footers';

    protected $fillable = [
        'companyname', 'telephone','category', 'facebook','twitter','instagrame',
    ];

    public $timestamps = true;
}
