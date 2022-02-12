<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable=['order_id','product_name','brand','quantity','budget','amount'];
    
}
