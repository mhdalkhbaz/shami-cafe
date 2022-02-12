<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;
use App\Model\Backend\Material;
 



class Material extends Model
{
    protected $fillable=['name','type'];


    public function mat()
    {
        return $this->hasOne('App\Model\Backend\Req');
    }

}
