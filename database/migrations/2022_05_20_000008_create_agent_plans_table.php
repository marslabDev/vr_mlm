<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentPlansTable extends Migration
{
    public function up()
    {
        Schema::create('agent_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->decimal('price', 15, 2);
            $table->longText('description')->nullable();
            $table->integer('commissionable_level');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
