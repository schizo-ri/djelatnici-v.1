<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
			$table->string('oib');
			$table->timestamp('datum_rodjenja')->nullable();
			$table->string('mobitel');
			$table->string('email');
			$table->string('prebivaliste_adresa');
			$table->string('prebivaliste_grad');
			$table->string('boraviste_adresa');
			$table->string('boraviste_grad');
			$table->string('zvanje');
			$table->string('bracno_stanje');	
			$table->integer('broj_djece');
			$table->string('radno_mjesto');
			$table->timestamp('lijecn_pregled')->nullable();
			$table->timestamp('ZNR')->nullable();
			$table->text('napomena');
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
        Schema::drop('employees');
    }
}
