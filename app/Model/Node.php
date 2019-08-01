<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $table = 'queue';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'expected_time', 'priority', 'status', 'khoa_id', 'answer'];
    public $timestamps = false;

    public function user() {
        return $this->hasOne('App\User', 'user_id', 'user_id');
    }

}
