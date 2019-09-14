<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('code');
            $table->integer('batch');
            $table->string('name');
            $table->integer('rollnumber');
            $table->string('tags');
            $table->integer('year');
            $table->text('title');
            $table->string('topic');
            $table->string('company');
            $table->string('supervisor');
            $table->text('abstract');
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
        Schema::dropIfExists('resources');
    }
}
