<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('daily_reports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('new_case_count')->unsigned();
            $table->integer('fatality_count')->unsigned();
            $table->longText('summary')->nullable(true);
            $table->unsignedBigInteger('control_node_id')->nullable(false);
            $table->foreign('control_node_id')->references('id')->on('control_nodes')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('daily_reports', function (Blueprint $table) {
            $table->dropForeign(['control_node_id']);
        });
    }
}
