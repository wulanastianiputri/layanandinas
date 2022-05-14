<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
	protected $table = 'kategori'; 
    protected $fillable = ['namakategori','bidang_id'];

    public function bidang()
    {
        return $this->belongsTo('App\Bidang');
    }
	
}
