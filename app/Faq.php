<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    protected $table = 'faq';
    protected $fillable = ['id','pertanyaan', 'jawaban'];
    public $timestamps = false;
}
