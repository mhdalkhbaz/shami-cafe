<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\choco_order;



class choco_order_det extends Model
{
    protected $table = "choco_order_dets";
    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'id',
        'branch_id',
        // 'order_id',
        'order_count_id',
        'status',
 
       
    ];

    public function choco_order()
    {
        return $this->hasMany(choco_order::class);
    }
}
