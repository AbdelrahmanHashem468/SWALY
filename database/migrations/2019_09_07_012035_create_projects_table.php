<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('desc');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->unsignedBigInteger('MD_id');
            $table->foreign('MD_id')->references('id')->on('users');
            $table->unsignedBigInteger('MTL_id');
            $table->foreign('MTL_id')->references('id')->on('users');
            $table->date('deadline');
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
        Schema::dropIfExists('projects');
    }
}
