<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->time('brake_end')->after('till');
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
