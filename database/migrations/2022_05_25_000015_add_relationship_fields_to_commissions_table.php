<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCommissionsTable extends Migration
{
    public function up()
    {
        Schema::table('commissions', function (Blueprint $table) {
            $table->unsignedBigInteger('agent_plan_id')->nullable();
            $table->foreign('agent_plan_id', 'agent_plan_fk_6661978')->references('id')->on('agent_plans');
        });
    }
}
