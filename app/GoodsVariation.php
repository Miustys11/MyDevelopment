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
    
    public function goods_variation() {
        return $this->belongsTo('App\Goods');
    }
    public function goods_variations_details() {
        return $this->hasMany('App\GoodsVariation');
    }
}
