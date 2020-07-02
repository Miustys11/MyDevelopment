<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsVariation extends Model
{
    protected $guarded = array('id');
    
    public static $rules  = array(
        'goods_id' => 'required',
        'size' => 'required',
        'color' => 'required',
        'price' => 'required',
        'stock' => 'required',
    );
    
}
