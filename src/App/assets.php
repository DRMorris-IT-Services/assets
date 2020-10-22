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
        'asset_name' , 
        'asset_model', 
        'asset_serial_no', 
        'asset_barcode', 
        'asset_tag_no', 
        'asset_purchase_date', 
        'asset_warranty_date', 
        'asset_assigned_to', 
        'asset_location', 
        'asset_software',
        'asset_status',

    ];
}
