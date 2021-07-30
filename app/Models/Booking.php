<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_event',
        'id_user',
        'date',
        'reserve_name'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function event(){
        return $this->belongsTo(Event::class, 'id_event', 'id');
    }

}
