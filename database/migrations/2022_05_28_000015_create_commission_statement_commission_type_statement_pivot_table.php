<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionStatementCommissionTypeStatementPivotTable extends Migration
{
    public function up()
    {
        Schema::create('commission_statement_commission_type_statement', function (Blueprint $table) {
            $table->unsignedBigInteger('commission_statement_id');
            $table->foreign('commission_statement_id', 'commission_statement_id_fk_6683317')->references('id')->on('commission_statements')->onDelete('cascade');
            $table->unsignedBigInteger('commission_type_statement_id');
            $table->foreign('commission_type_statement_id', 'commission_type_statement_id_fk_6683317')->references('id')->on('commission_type_statements')->onDelete('cascade');
        });
    }
}
