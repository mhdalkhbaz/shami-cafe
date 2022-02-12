<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=
    [    'name','catogry_id'        ];




    public function catogry()
    {
        return $this->belongsTo('App\Models\Catogry');
    }

    public function address()
    {
        return $this->hasOne('App\Address');
    }

}
