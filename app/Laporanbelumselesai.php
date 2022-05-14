<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporanbelumselesai extends Model
{
	protected $table = 'layanan'; 
    protected $fillable = ['pd_id','kategori_id','judul','isi','foto'];

    public function pd()
    {
        return $this->belongsTo('App\Perangkatdaerah');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    } 
    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class,"jawaban_id");
    }

}
