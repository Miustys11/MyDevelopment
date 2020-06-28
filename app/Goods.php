<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $guarded = array('id');
    
    public static $rules  = array(
        'category_id' => 'required',
        'name' => 'required',
        'amount' => 'required',
        'size' => 'required',
        'description' => 'required'
    );
    
    // Goodsモデルに関連付けを行う
    public function histories() {
        
        // hasManyは一対多のリレーションを定義する
        // メソッド名は複数形になる
        // 関連づいているレコードの一覧を取得
        // goodsテーブルに関連づいているhistoriesテーブルをすべて取得する
        return $this->hasMany('App\GoodsHistory');
    }
    
    public function category() {
        
        return $this->belongsTo('App\Category');
    }
}
