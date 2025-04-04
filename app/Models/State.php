<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name', 'country_id', 'country_code', 'fips_code',
        'iso2', 'type', 'latitude', 'longitude', 'flag', 'wikiDataId'
    ];

    // Define the relationship with country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Define the relationship with cities
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
