<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hiking extends Model
{
	protected $table = 'hikings';
    protected $fillable = [
    	'nik',
    	'nama',
    	'jk',
    	'umur',
		'alamat',
    	'tgl_naik',
    	'tgl_turun',
		'no_telp',
		'id_jalur',
		'image'
	];
	// Relasi Hiking - jalur
    public function jalur() {
        return $this->belongsTo('App\Jalur', 'id_jalur');
    }
}
