<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Weather
 *
 * @property int $id
 * @property string $locationname
 * @property string $geocode
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Weather whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Weather whereGeocode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Weather whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Weather whereLocationname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Weather whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Weather extends Model
{
    
    protected $fillable = [
        'locationname', 'geocode'
    ];
}
