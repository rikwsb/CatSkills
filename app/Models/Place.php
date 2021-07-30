<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'name',
        'street',
        'surface'
    ];

    public function events(){
        return $this->hasMany(Event::class);
    }

}
