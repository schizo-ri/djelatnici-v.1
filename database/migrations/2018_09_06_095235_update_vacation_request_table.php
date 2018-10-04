<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateVacationRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vacation_requests', function (Blueprint $table) {
		$table->time('vrijeme_od')->after('GOzavršetak');
		$table->time('vrijeme_do')->after('vrijeme_od');
		$table->string('zahtjev')->nullable($value = true);
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
