<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionTypeStatementsTable extends Migration
{
    public function up()
    {
        Schema::create('commission_type_statements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type')->nullable();
            $table->decimal('sub_total', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
