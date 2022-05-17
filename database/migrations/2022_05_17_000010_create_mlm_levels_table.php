<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMlmLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('mlm_levels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('position')->nullable();
            $table->string('path')->nullable();
            $table->integer('level')->nullable();
            $table->integer('children_count')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
