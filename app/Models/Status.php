<?php

namespace App\Models;

// use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';

    protected $fillable = [
        'body',
    ];

    // protected $hidden = [
    //     'remember_token',
    // ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
