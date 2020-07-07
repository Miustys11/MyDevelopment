<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use App\Like;

class Goods extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = array('id');
    protected $fillable = ['user_id'];
    
    public static $rules  = array(
        'category_id' => 'required',
        'name' => 'required',
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
    
    public function sub_category() {
        
        return $this->belongsTo('App\SubCategory');
    }
    
    public function category_type() {
        
        return $this->belongsTo('App\CategoryType');
    }

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function likes()
    {
      return $this->hasMany('App\Like');
    }

    public function like_by()
    {
      return Like::where('user_id', Auth::user()->id)->first();
    }
}
