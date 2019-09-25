<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumbnailToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {            
            $table->integer('thumbnail_id')->after('description')->nullable()->unsigned();
            $table->foreign('thumbnail_id')->references('id')->on('artworks');
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
            $table->dropForeign('categories_thumbnail_id_foreign');
            $table->dropColumn('thumbnail_id');
        });
    }
}
