<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //

    protected $fillable = [
        'site_name','áddress','contact_number','contact_email'
    ];

}
