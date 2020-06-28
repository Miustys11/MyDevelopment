<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // 変更可能
    protected $fillable = [
       'goods_id', 'user_id', 'qty',
   ];
   
}
