<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAgentPlansTable extends Migration
{
    public function up()
    {
        Schema::table('agent_plans', function (Blueprint $table) {
            $table->unsignedBigInteger('roles_id')->nullable();
            $table->foreign('roles_id', 'roles_fk_6638182')->references('id')->on('roles');
        });
    }
}
