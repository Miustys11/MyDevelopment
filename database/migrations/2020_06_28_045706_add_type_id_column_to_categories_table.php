<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeIdColumnToCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            
            // CategoryType->id の時は、追加するときの名前は category_type_idのように大文字で_で区切るようにするのがルール
            $table->unsignedInteger('type_id')->after('id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            // カラムを削除するときは、 dropColumn メソッドを使う
            $table->dropColumn('type_id');
        });
    }
}
