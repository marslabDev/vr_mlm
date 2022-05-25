<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration
{
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('commission');
            $table->integer('level');
            $table->string('type')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
