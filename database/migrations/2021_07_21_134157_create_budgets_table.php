<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->integer('value');
            $table->string('objetive');
            $table->boolean('state');

            $table->unsignedBigInteger('budget_type_id');
            $table->foreign('budget_type_id')->references('id')->on('budget_types')
                ->onDelete('cascade');

            $table->unsignedBigInteger('action_plan_id');
            $table->foreign('action_plan_id')->references('id')->on('action_plans')
                ->onDelete('cascade');

            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')
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
        Schema::dropIfExists('budgets');
    }
}
