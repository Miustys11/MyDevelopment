<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $guarded = array('id');
    
    public static $rules  = array(
        'goods-name' => 'required',
        'amount' => 'required',
        'description' => 'required'
    );
}
