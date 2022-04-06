<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudgetPointSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budget_point_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('budget_point_sale');
            
            $table->unsignedBigInteger('budget_territory_id');
            $table->foreign('budget_territory_id')->references('id')->on('budget_territories')
                ->onDelete('cascade');

            $table->unsignedBigInteger('event_plan_action_id');
            $table->foreign('event_plan_action_id')->references('id')->on('event_plan_actions')
                ->onDelete('cascade');

            $table->unsignedBigInteger('execution_statu_id');
            $table->foreign('execution_statu_id')->references('id')->on('execution_status')
                ->onDelete('cascade');

            $table->unsignedBigInteger('point_sale_id');
            $table->foreign('point_sale_id')->references('id')->on('point_sales')
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
        Schema::dropIfExists('budget_point_sales');
    }
}
