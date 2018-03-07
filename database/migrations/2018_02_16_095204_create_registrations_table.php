<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('employee_id');
			$table->integer('radnoMjesto_id');
			$table->date('datum_prijave');
			$table->integer('probni_rok')->nullable($value = true);
			$table->integer('staz')->nullable($value = true);
			$table->date('lijecn_pregled')->nullable();
			$table->date('ZNR')->nullable();
			$table->string('napomena')->nullable($value = true);
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
         Schema::drop('registrations');
    }
}
