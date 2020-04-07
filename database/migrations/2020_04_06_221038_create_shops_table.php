<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->BigIncrements('id');
            $table->string('shopname')->nullable(false);
            $table->boolean('visible')->nullable(false);
            $table->unsignedBigInteger('shoptype')->nullable(false);
            $table->foreign('shoptype')->references('id')->on('shoptypes');
            $table->mediumText('description')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
