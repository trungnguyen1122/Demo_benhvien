<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $table = 'medicine';
    protected $primaryKey = 'id';
    public $fillable = ['id','name','unit'];
    public $timestamps = false;
}
