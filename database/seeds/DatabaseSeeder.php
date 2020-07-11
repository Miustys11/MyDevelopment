<?php

use Illuminate\Database\Seeder;
use App\Goods;
use App\SubCategory;
use App\CategoryType;
use App\Category;
use App\GoodsVariation;
use App\GoodsVariationsDetail;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cate_type = new CategoryType;
        $cate_type->name = "WOMAN";
        $cate_type->save();
        $cate = new Category;
        $cate->name = "tops";
        $cate->category_type_id = $cate_type->id;
        $cate->save();
        $sub_cate = new SubCategory;
        $sub_cate->name = "T-shirts";
        $sub_cate->category_id = $cate->id;
        $sub_cate->save();


        $goods = new Goods;
        $goods->name = "VネックTシャツ";
        $goods->description = "商品説明です";
        $goods->category_id = $cate_type->id;
        $goods->category_type_id = $cate->id;
        $goods->sub_category_id = $sub_cate->id;
        $goods->save();

        $goods_variation = new GoodsVariation;
        $goods_variation->size =  "S";
        $goods_variation->color = "white";
        $goods_variation->goods_id = $goods->id;
        $goods_variation->save();

        $goods_variations_details = new GoodsVariationsDetail;
        $goods_variations_details->price =  1000;
        $goods_variations_details->stock = 1;
        $goods_variations_details->goods_variations_id = $goods_variation->id;
        $goods_variations_details->save();

        $cate_type = new CategoryType;
        $cate_type->name = "MAN";
        $cate_type->save();
        $cate = new Category;
        $cate->name = "tops";
        $cate->category_type_id = $cate_type->id;
        $cate->save();
        $sub_cate = new SubCategory;
        $sub_cate->name = "T-shirts";
        $sub_cate->category_id = $cate->id;
        $sub_cate->save();


        $goods = new Goods;
        $goods->name = "VネックTシャツ";
        $goods->description = "商品説明です";
        $goods->category_id = $cate_type->id;
        $goods->category_type_id = $cate->id;
        $goods->sub_category_id = $sub_cate->id;
        $goods->save();

        $goods_variation = new GoodsVariation;
        $goods_variation->size =  "S";
        $goods_variation->color = "white";
        $goods_variation->goods_id = $goods->id;
        $goods_variation->save();

        $goods_variations_details = new GoodsVariationsDetail;
        $goods_variations_details->price =  1000;
        $goods_variations_details->stock = 1;
        $goods_variations_details->goods_variations_id = $goods_variation->id;
        $goods_variations_details->save();
       
    }
}
