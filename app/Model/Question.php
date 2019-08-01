<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "question";
    protected $primaryKey = "id";
    protected $fillable = ['khoa_id', 'question'];

    public $timestamps = false;
}
