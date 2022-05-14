<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table ='level';
	protected $fillable = ['id','namalevel'];

    public function user()
    {
        return $this->hasMany('App\User');
    }
}


