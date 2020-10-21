<?php

namespace duncanrmorris\assets\App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class assetscontrols extends Model
{
    //
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'asset_admin', 'asset_view', 'asset_add', 'asset_del', 'asset_edit',
    ];
}
