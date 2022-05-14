<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perangkatdaerah extends Model
{
    protected $table ='pd';
	protected $fillable = ['namapd','nomenklatur','alamat','email','telp','website','kontak','hp'];

    public function jawabans()
    {
        return $this->hasManyThrough('App\Jawaban', 'App\Layanan', 'pd_id', 'permintaanlayanan_id');
    }
    
  
}

