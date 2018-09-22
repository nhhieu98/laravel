<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCameraToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('camera_truoc')->nullable();
            $table->string('camera_sau')->nullable();
            $table->string('sim')->nullable();
            $table->string('pin')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('camera_truoc');
            $table->dropColumn('camera_sau');
            $table->dropColumn('sim');
            $table->dropColumn('pin');
        });
    }
}
