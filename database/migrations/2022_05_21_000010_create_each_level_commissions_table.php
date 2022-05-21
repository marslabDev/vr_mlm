<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEachLevelCommissionsTable extends Migration
{
    public function up()
    {
        Schema::create('each_level_commissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('commission');
            $table->integer('level');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
