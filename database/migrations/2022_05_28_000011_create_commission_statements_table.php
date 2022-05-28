<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionStatementsTable extends Migration
{
    public function up()
    {
        Schema::create('commission_statements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('total', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
