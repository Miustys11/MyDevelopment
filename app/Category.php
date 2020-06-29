<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // ソフトデリートを使用可能にする
    use SoftDeletes;
    
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    // 削除、作成、更新した日がわかるように$datesでdeleted_atカラムを作成
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    
    public function category_type() {
        
        return $this->belongsTo('App\CategoryType', 'type_id');
    }
    
    public function sub_categories() {
        
        return $this->hasMany('App\SubCategory');
    }
    

}
