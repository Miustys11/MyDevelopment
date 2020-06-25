<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    protected $dates = ['deleted_at', 'created_at', 'updated_at'];
    
    /**
     * カテゴリリストを取得する
     *
     * @param int    $num_per_page 1ページ当たりの表示件数
     * @param string $order        並び順の基準となるカラム
     * @param string $direction    並び順の向き asc or desc
     * @return mixed
     */
    
    public function getCategoryList(int $num_per_page = 0, string $direction = 'asc') {
        
        $query = $this->orderBy($direction);
        if ($num_per_page) {
            return $query->paginate($num_per_page);
        }
        return $query->get();
        
    }
}
