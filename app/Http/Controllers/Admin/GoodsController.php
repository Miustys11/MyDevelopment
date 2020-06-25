<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Goods;
use App\GoodsHistory;
use App\Category;
use Carbon\Carbon;

class GoodsController extends Controller
{
    
    protected $goods;
    
    protected $category;
    
    const NUM_PER_PAGE = 10;
    
    function __construct(Goods $goods, Category $category)
    {
        $this->goods = $goods;
        $this->category = $category;
    }
    
    
    public function add() {
        return view('admin.goods.create');
    }
    
    public function create(Request $request) {
        
        // Varidationを行う
        $this->validate($request, Goods::$rules);
        
        $goods = new Goods;
        $form = $request->all();
      
        // フォームから画像が送信されてきたら、保存して、 $goods->image_path に画像のパスを保存する
        if (isset($form['image'])) {
            $path = $request->file('image')->store('public/image');
            $goods->image_path = basename($path);
        } else {
            $goods->image_path = null;
        }
        
        $form['category_id'] = 1;
      
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
          
        // フォームから送信されてきたimageを削除する
        unset($form['image']);
        
      
        // データベースに保存する
        $goods->fill($form);
        $goods->save();
      
      
        return redirect('admin/goods/create');
    }
    
  
    public function index(Request $request) {
        
        $cond_title = $request->cond_title;
        
        // !== にすると、型まで厳密に比較する
        // 最初、 !== と入力してエラーが出てしまった。''の型はstringで$cond_titleに入るのは文字列になるので厳密に比較されてもエラーにはならないと考えた。
        // 結果、初期値にはnullがはいっているので !== にしたときに厳密に比較されstring型とnull型でエラーが出ていたことがわかった。
        // ここではただ$cond_titleに何か入っていればいいだけなので厳密に比較する必要はない。
        // if ($cond_title) でもいい
        
        if ($cond_title != '') {
            
            // 検索されたら検索結果を取得する
            $posts = Goods::where('name', $cond_title)->get();
        } else {
            
            // それ以外はすべてのアイテムを取得する
            $posts = Goods::all();
        }
        
        return view('admin.goods.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function edit(Request $request) {
        
        // Goods Modelからデータを取得する
        $goods = Goods::find($request->id);
        
        if (empty($goods)) {
            abort(404);
        }
        
        return view('admin.goods.edit', ['goods_form' => $goods]);
        
    }
    
    public function update(Request $request) {
        
        // Validationをかける
        $this->validate($request, Goods::$rules);
        
        // Goods Modelからデータを取得する
        $goods = Goods::find($request->id);
        
        // 送信されてきたフォームデータを格納する
        $goods_form = $request->all();
        
        if (isset($goods_form['image'])) {
            $path = $request->file('image')->store('public/image');
            $goods->image_path = basename($path);
            unset($goods_form['image']);
        }  elseif (isset($request->remove)) {
            $goods->image_path = null;
            unset($goods_form['remove']);
        }
        
        unset($goods_form['_token']);
        
        // 該当するデータを上書きして保存する
        $goods->fill($goods_form)->save();
        
        $history = new GoodsHistory;
        $history->goods_id = $goods->id;
        
        // Carbon::now()で現在時刻を取得
        $history->edited_at = Carbon::now('Asia/Tokyo');
        $history->save();
        
        return redirect('admin/goods');
    }
  
    public function delete(Request $request) {
      
        // 該当するGoods Modelを取得
        $goods = Goods::find($request->id);
      
        // 削除する
        $goods->delete();
      
        return redirect('admin/goods/');
    }
    
    
    /**
     * カテゴリ一覧画面
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    
    public function category(Request $request)
    {
        $list = $this->category->getCategoryList(self::NUM_PER_PAGE);
        return view('admin.goods.category', compact('list'));
    }

}
