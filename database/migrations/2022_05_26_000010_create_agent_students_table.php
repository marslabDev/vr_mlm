<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('agent_students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tuition_package_efk');
            $table->integer('student_efk');
            $table->integer('referral_efk');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
