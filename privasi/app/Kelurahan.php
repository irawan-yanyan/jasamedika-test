<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
	protected $table = "tbkelurahan";
	public $timestamps = false;
	protected $fillable = ["id","nama_kelurahan","nama_kecamatan","nama_kota","user_id"];

}
