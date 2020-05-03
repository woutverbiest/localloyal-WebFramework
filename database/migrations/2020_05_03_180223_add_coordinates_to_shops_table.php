<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoordinatesToShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function ($table) {
            $table->double('latitude',8,6);
            $table->boolean('latitudepos');
            $table->double('longitude',9,6);
            $table->boolean('longitudepos');
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
            $table->dropColumn('latitude');
            $table->dropColumn('latitudepos');
            $table->dropColumn('longitude');
            $table->boolean('longitudepos');
        });
    }
}
