<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryType extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    // 削除、作成、更新した日がわかるように$datesでdeleted_atカラムを作成
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
}
