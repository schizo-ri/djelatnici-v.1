<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAfterHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('after_hours', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employee_id')->unsigned();
            $table->date('datum')->nullable();
            $table->time('vrijeme_od');
            $table->time('vrijeme_do');
            $table->string('napomena')->nullable($value = true);
            $table->string('odobreno')->nullable($value = true);
            $table->integer('odobrio_id')->unsigned();
            $table->date('datum_odobrenja')->nullable();
            $table->timestamps();
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('odobrio_id')->references('id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('after_hours');
    }
}
