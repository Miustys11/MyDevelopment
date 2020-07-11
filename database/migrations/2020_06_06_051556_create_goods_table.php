<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            
            $table->bigIncrements('id');
            $table->string('name'); //商品の名前を保存するカラム
            // $table->integer('amount'); // 商品の値段を保存するカラム
            // $table->string('size'); // 商品のサイズを保存するカラム
            $table->string('image_path')->nullable(); // 画像のパスを保存するカラム
            $table->string('description'); // 商品の説明を保存するカラム
            $table->integer('likes_count')->default(0);
            $table->softDeletes();
            $table->boolean('is_downloadble')->default(false);
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('category_type_id');
            $table->unsignedInteger('sub_category_id');
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
        Schema::dropIfExists('goods');
    }
}
