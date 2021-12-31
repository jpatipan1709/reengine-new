<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'companyname', 'telephone','category', 'facebook','twitter','instagrame',
    ];

    public $timestamps = true;

    public function category()
    {
        return $this->hasOne('App\Category','id', 'category_id');
    }

    public function album()
    {
        return $this->hasOne('App\Album','product_id', 'id');
    }

    public function albums()
    {
        return $this->hasMany('App\Album','product_id', 'id');
    }
}
