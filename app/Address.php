<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    public function students()
    {
        return $this->hasOne('App\Student');
    }
}
