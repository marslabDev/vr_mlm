<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionEachLevelCommissionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('commission_each_level_commission', function (Blueprint $table) {
            $table->unsignedBigInteger('commission_id');
            $table->foreign('commission_id', 'commission_id_fk_6644993')->references('id')->on('commissions')->onDelete('cascade');
            $table->unsignedBigInteger('each_level_commission_id');
            $table->foreign('each_level_commission_id', 'each_level_commission_id_fk_6644993')->references('id')->on('each_level_commissions')->onDelete('cascade');
        });
    }
}
