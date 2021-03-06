<?php

namespace Modules\Jurusan\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunAkademik extends Model {

	protected $table = 'jurusan_tahun_akademik';
	public $timestamps = true;

	use SoftDeletes;

	protected $dates = ['deleted_at'];
	protected $fillable = array('tahun_akademik', 'semester', 'status', 'tanggal_mulai', 'tanggal_berakhir');

}