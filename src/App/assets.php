<?php

namespace duncanrmorris\assets\App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class assets extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'asset_id',

    ];
}
