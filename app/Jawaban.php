<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
	protected $table = 'jawaban'; 
    protected $fillable = ['permintaanlayanan_id','user_id','jawaban'];

    public function layanan()
    {
        return $this->hasMany(Layanan::class,"permintaanlayanan_id");
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
   
}
//'foto_jawaban'