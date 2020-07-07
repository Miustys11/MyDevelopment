<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    public $counterCacheOptions = [
        'Goods' => [
            'field' => 'likes_count',
            'foreignKey' => 'goods_id'
        ]
    ];

    protected $fillable = ['user_id', 'goods_id'];

    public function Goods()
    {
      return $this->belongsTo('App\Goods');
    }

    public function User()
    {
      return $this->belongsTo(User::class);
    }
}
