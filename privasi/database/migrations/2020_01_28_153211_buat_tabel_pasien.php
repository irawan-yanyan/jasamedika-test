<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BuatTabelPasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbpasien', function($t) {
                        $t->increments('id');
                        $t->string('nama_pasien',100);
			            $t->string('alamat_pasien',100);
			            $t->string('telp_pasien',20);
			            $t->string('rtrw',20);
			            $t->string('jeniskelamin_pasien',20);				
			            $t->date('tanggallahir_pasien',100);
			            $t->integer('user_id');
			            $t->integer('kelurahan_id');						
                        $t->string('genid_pasien', 10)->nullable();
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
