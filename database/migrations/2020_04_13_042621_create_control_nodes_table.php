<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_nodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('node_city')->nullable(false);
            $table->string('node_subcity')->nullable(false);
            $table->string('node_woreda')->nullable(false);
            $table->string('node_kebela')->nullable(false);
            $table->string('node_name')->nullable(false);
            $table->string('node_detail')->nullable(true);
            $table->enum('node_type', ['central', 'child'])->default('child');
            $table->unsignedBigInteger('node_manager')->nullable(false);
            $table->foreign('node_manager')->on('users')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('control_nodes', function (Blueprint $table) {
            $table->dropForeign(['node_manager']);
        });
    }
}
