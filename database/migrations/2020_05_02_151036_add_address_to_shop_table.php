<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAddressToShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function ($table) {
            $table->string('phonenumber');
            $table->string('street');
            $table->string('city');
            $table->string('number');
            $table->string('zip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table){
            $table->dropColumn('phonenumber');
            $table->dropColumn('street');
            $table->dropColumn('city');
            $table->dropColumn('number');
            $table->dropColumn('zip');
        });
    }
}
