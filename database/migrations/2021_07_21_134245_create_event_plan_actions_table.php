<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventPlanActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_plan_actions', function (Blueprint $table) {
            $table->id();
            $table->string('observation');
       
            $table->unsignedBigInteger('event_id');
            $table->foreign('event_id')->references('id')->on('events')
                ->onDelete('cascade');

            $table->unsignedBigInteger('action_plan_id');
            $table->foreign('action_plan_id')->references('id')->on('action_plans')
                ->onDelete('cascade');

            $table->boolean('state');
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
        Schema::dropIfExists('event_plan_actions');
    }
}
