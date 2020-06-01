<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    protected $fillable = [
        'avatar',
        'user_id',
        'about',
        'facebook',
        'linkedin',
        'youtube',
        'github',
        'instagram'
    ];
}
