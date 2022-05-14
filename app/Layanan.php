<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
	protected $table = 'layanan'; 
    protected $fillable = ['pd_id','kategori_id','status_id','proses_id','user_id','judul','isi','foto', 'created_at','updated_at'];
    protected $attributes = [
        'status_id' => '1',
           
   ];
    
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

    public function user()
    {
        // return $this->hasMany(User::class,"permintaanlayanan_id");
        return $this->belongsTo('App\User');
    }
  
    

}