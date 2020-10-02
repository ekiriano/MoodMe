<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moods extends Model
{
    protected $fillable = ['title','is_selected', 'profile_id'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
