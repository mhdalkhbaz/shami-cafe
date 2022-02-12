<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Cust extends Model
{
    protected $fillable=['id','name','phone','address' ];
    protected $table = 'customers';

}
