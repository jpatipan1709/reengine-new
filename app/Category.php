<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'categoryname'
    ];

    public $timestamps = true;

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }

    public function product()
    {
        return $this->hasOne(Product::class,'category_id','id');
    }
}
