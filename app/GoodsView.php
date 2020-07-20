<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsView extends Model
{
    protected $fillable = ['user_id', 'goods_id'];

    public function goods()
    {
        return $this->belongsTo('App\Goods');
    }
}
