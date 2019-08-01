<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    protected $table = 'booking';
    protected $primaryKey = 'booking_id';
    protected $fillable = ['user_id', 'datetime', 'status', 'answer', 'khoa_id'];
    public $timestamps = false;

    public function user() {
        return $this->hasOne('App\User', 'user_id', 'user_id');
    }

}
