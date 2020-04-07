<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBrakesToOpeninghoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('openinghours', function ($table) {
            $table->time('brake_start')->after('till');
            $table->time('brake_end')->after('brake_start');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('openinghours', function(Blueprint $table){
            $table->dropColumn('brake_start');
            $table->dropColumn('brake_end');
        });
    }
}
