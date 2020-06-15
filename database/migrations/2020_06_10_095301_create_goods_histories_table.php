<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_histories', function (Blueprint $table) {
            $table->increments('id');
            
            // 外部キー
            // 従テーブルに主テーブルのプライマリキー「id」を保存するカラムを用意する
            // 外部キーは単数形の名前にするのが慣習
            // Goodsテーブルの「id」と「goods_id」が関連付いている
            $table->integer('goods_id');
            $table->string('edited_at');
            
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods_histories');
    }
}
