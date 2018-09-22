<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('screen')->nullable();
            $table->string('ram')->nullable();
            $table->string('cpu')->nullable();
            $table->string('os')->nullable();
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
            $table->dropColumn('name');
            $table->dropColumn('type');
            $table->dropColumn('screen');
            $table->dropColumn('ram');
            $table->dropColumn('cpu');
            $table->dropColumn('os');
        });
    }
}
