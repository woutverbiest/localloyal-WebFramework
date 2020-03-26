<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpeninghoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openinghours', function(Blueprint $table){
            $table->unsignedBigInteger('shop_id')->nullable(false);
            $table->foreign('shop_id')->references('id')->on('shops');
            $table->unsignedBigInteger('day_id')->nullable(false);
            $table->foreign('day_id')->references('id')->on('days');
            $table->time('from');
            $table->time('till');
            $table->boolean('closed')->default(0);
            $table->timestamps();

            $table->primary(['shop_id','day_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('openinghours');
    }
}
