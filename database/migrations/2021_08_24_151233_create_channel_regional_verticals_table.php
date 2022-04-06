<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChannelRegionalVerticalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('channel_regional_verticals', function (Blueprint $table) {
            $table->id();

            $table->integer('weight');

            $table->unsignedBigInteger('vertical_id');
            $table->foreign('vertical_id')->references('id')->on('verticals')
                ->onDelete('cascade');


            $table->unsignedBigInteger('channel_id');
            $table->foreign('channel_id')->references('id')->on('channels')
                ->onDelete('cascade');


            $table->unsignedBigInteger('regional_id');
            $table->foreign('regional_id')->references('id')->on('regionals')
            ->onDelete('cascade');

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
        Schema::dropIfExists('channel_regional_verticals');
    }
}
