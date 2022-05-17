<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMlmPackagesTable extends Migration
{
    public function up()
    {
        Schema::table('mlm_packages', function (Blueprint $table) {
            $table->unsignedBigInteger('roles_id')->nullable();
            $table->foreign('roles_id', 'roles_fk_6615768')->references('id')->on('roles');
        });
    }
}
