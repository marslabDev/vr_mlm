<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesCommissionsTable extends Migration
{
    public function up()
    {
        Schema::create('packages_commissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tuition_package_efk')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
