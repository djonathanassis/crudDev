<?php

namespace CrudDev;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $table = 'property';

    protected $fillable = ['title', 'name', 'description', 'rental_price', 'sale_price'];

    public $timestamps = false;

}
