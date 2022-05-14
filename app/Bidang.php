<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    protected $table ='bidang';
	protected $fillable = ['namabidang'];

    public function kategories()
    {
        return $this->hasMany('App\Kategories');
    }

}
