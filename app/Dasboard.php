<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dasboard extends Model
{
	protected $table = 'layanan'; 
    protected $fillable = ['pd_id','kategori_id','status_id','judul','isi','foto'];

    public function pd()
    {
        return $this->belongsTo('App\Perangkatdaerah');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori');
    } 
    public function Status()
    {
        return $this->belongsTo('App\Status');
    }
    public function jawaban() 
    {
        return $this->hasMany(Jawaban::class,"permintaanlayanan_id");
    } 
    // public function count_layanan(){
    //     $this->ci->model('layanan');
    //     return $this->ci->layanan->get()->num_rows()
    // }
    // public function count_belumselesai(){
    //     $this->ci->model('layanan');
    //     return $this->ci->layanan->get()->num_rows()
    // }
    // public function count_belumditindaklanjuti(){
    //     $this->ci->model('layanan')->get()->num_rows();
    //     return $this->ci->layanan->get()->num_rows()
    // }

}
