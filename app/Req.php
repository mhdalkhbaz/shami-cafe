<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Req extends Model
{
    protected $fillable=['order_id','material_id','qty1','qty2'];



    public function maat()
    {
        return $this->hasone('App\Model\Backend\Material','id');
    }}
