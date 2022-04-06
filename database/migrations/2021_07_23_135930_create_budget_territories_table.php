<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetTerritoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_territories', function (Blueprint $table) {
            $table->id();
            $table->string('budget');

            $table->unsignedBigInteger('channel_id');
            $table->foreign('channel_id')->references('id')->on('channels')
                ->onDelete('cascade');


            $table->unsignedBigInteger('regional_id');
            $table->foreign('regional_id')->references('id')->on('regionals')
            ->onDelete('cascade');
            
            $table->unsignedBigInteger('territory_id');
            $table->foreign('territory_id')->references('id')->on('territories')
                ->onDelete('cascade');

            $table->unsignedBigInteger('budget_channel_regional_id');
            $table->foreign('budget_channel_regional_id')->references('id')->on('budget_channel_regionals')
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
        Schema::dropIfExists('budget_territories');
    }
}
