<?php

namespace App\Infrastructure\Laravel\Model;

use Illuminate\Database\\Eloquent\Model;

class CityModel extends Model {

    protected $fillable = [
        'name',
    ];

    protected $table = 'cities';
}

