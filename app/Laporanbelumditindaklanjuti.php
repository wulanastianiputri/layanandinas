<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporanbelumditindaklanjuti extends Model
{
	protected $table = 'layanan'; 
    protected $fillable = ['pd_id','kategori_id','status_id','judul','isi','foto','tanggal','created_at'];

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])->format('d F Y H:i');
    }
    public function getUpdatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])->diffForHumans();
    }

    public function pd()
    {
        return $this->belongsTo('App\Perangkatdaerah');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    } 
    public function jawaban()
    {
        return $this->belongsTo(Jawaban::class,"jawaban_id");
    }

}
