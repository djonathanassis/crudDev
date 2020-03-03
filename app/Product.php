<?php

namespace CrudDev;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    protected $fillable = ['name', 'url'];

    public $timestamps = false;

    public function testes()
    {
        return $this->belongsTo(Product::class, 'category_id', 'id');

    }
}
