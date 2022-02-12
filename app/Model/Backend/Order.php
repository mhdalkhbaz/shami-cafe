<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    protected $fillable = ['id','user_Name','branch_address','support_id','completed'];
 


    protected $hidden = ['created_at'];
}


