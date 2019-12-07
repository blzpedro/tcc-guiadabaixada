<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    protected $fillable = [
        'user_id', 'local'
    ];

    public function usuario()
    {
        $this->belongsTo('App\User');
    }
}
