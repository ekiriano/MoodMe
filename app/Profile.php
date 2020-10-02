<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['mood_percentage'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function moods()
    {
        return $this->hasMany(Moods::class);
    }

}
