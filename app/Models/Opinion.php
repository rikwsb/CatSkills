<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;


    protected $fillable = [
        'id_user',
        'id_event',
        'description',
        'score'
    ];

    public function event(){
        return $this->belongsto(Event::class, 'id_event', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class,'id_user', 'id');
    }
}
