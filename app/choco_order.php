<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\choco_order_det;


class choco_order extends Model
{
    protected $table = "choco_orders";
    protected $conn = "choco_orders";

    //
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'ch_id',
        'order_count_id',
        'chocodetails_id',
        'order_count',
        'jrd_count',
        'choco_name',
        'color',
        'label',
        'typeFilling',
       
    ];


    public function choco_order_det()
    {
        return $this->belongsTo(choco_order_det::class);
    }
}
