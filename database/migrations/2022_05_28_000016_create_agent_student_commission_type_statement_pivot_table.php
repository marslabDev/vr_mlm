<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentStudentCommissionTypeStatementPivotTable extends Migration
{
    public function up()
    {
        Schema::create('agent_student_commission_type_statement', function (Blueprint $table) {
            $table->unsignedBigInteger('commission_type_statement_id');
            $table->foreign('commission_type_statement_id', 'commission_type_statement_id_fk_6683340')->references('id')->on('commission_type_statements')->onDelete('cascade');
            $table->unsignedBigInteger('agent_student_id');
            $table->foreign('agent_student_id', 'agent_student_id_fk_6683340')->references('id')->on('agent_students')->onDelete('cascade');
        });
    }
}
