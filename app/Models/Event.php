<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;


    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'desc',
        'date',
        'hour',
        'people_max',
        'id_place',
        'image'
    ];

    public function place(){
        return $this->belongsTo(Place::class, 'id_place');
    }

    public function booking(){
        return $this->hasMany(Booking::class);
    }

    public function opinions(){
        return $this->hasMany(Opinion::class);
    }

}
