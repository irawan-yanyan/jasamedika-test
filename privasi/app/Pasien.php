<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = "tbpasien";
	public $timestamps = false;
	protected $fillable = ["id","nama_pasien","alamat_pasien","telp_pasien","rtrw",
							"jeniskelamin_pasien","tanggallahir_pasien","user_id",
						   "kelurahan_id"];
}
