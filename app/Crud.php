<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
    //
    protected $fillable = [
        'hostname','loopback','mackaddress'
    ];
}
