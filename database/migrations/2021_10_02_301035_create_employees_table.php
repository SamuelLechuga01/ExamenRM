<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->date('birthday');
            $table->string('gender')->nullable();
            $table->double('phone')->nullable();
            $table->double('mobile')->nullable();
            $table->date('date');
            $table->unsignedBigInteger('departament_id');
            $table->unsignedBigInteger('company_id');

            $table->foreign('departament_id')->references('id')->on('departaments');
            $table->foreign('company_id')->references('id')->on('companies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
