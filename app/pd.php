<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pd extends Model
{
    protected $table='pd';
    public $timestamps=false;
    protected $fillable = ['nama_pd','alias','email','telp','kontak','hp'];
}
