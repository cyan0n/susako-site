<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateArtwork extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artworks', function (Blueprint $table) {
            $table->string('extension', 8)->after('url_name');
            $table->boolean('is_available')->after('description')->default(true);
            $table->decimal('price', 5, 2)->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('artworks', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->dropColumn('is_available');
            $table->dropColumn('extension');
        });
    }
}
