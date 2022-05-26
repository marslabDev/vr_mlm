<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPackagesCommissionsTable extends Migration
{
    public function up()
    {
        Schema::table('packages_commissions', function (Blueprint $table) {
            $table->unsignedBigInteger('commission_id')->nullable();
            $table->foreign('commission_id', 'commission_fk_6661993')->references('id')->on('commissions');
        });
    }
}
