<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelKelurahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    //
		Schema::create('tbkelurahan', function($t) {
			$t->increments('id_kelurahan');
			$t->string('nama_kelurahan', 100);
			$t->string('nama_kecamatan',100);
			$t->string('nama_kota',100);
			$t->unsignedInteger('user_id');
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
