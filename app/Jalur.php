<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jalur extends Model
{
    protected $table = 'jalur';

    protected $fillable = ['nama_jalur'];

    public function hiking() {
        return $this->hasMany('App\Hiking', 'id_jalur');
    }
    public function pendaki() {
        return $this->hasMany('App\Pendaki', 'id_jalur');
    }
}
