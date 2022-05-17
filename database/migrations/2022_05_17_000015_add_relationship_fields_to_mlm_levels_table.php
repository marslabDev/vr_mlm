<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMlmLevelsTable extends Migration
{
    public function up()
    {
        Schema::table('mlm_levels', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6615574')->references('id')->on('users');
            $table->unsignedBigInteger('current_plan_id')->nullable();
            $table->foreign('current_plan_id', 'current_plan_fk_6615575')->references('id')->on('mlm_packages');
            $table->unsignedBigInteger('up_line_id')->nullable();
            $table->foreign('up_line_id', 'up_line_fk_6615576')->references('id')->on('products');
        });
    }
}
