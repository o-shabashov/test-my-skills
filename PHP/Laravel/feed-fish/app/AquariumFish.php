<?php

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class AquariumFish
 * @property int           $aquarium_id
 * @property int           $fish_id
 * @property \App\Aquarium $aquarium
 * @property \App\Fish     $fish
 * @package App
 */
class AquariumFish extends Eloquent
{
    public $incrementing = false;
    public $timestamps   = false;

    protected $casts = [
        'aquarium_id' => 'int',
        'fish_id'     => 'int',
    ];

    protected $fillable = [
        'aquarium_id',
        'fish_id',
    ];

    public function aquarium()
    {
        return $this->belongsTo(\App\Aquarium::class);
    }

    public function fish()
    {
        return $this->belongsTo(\App\Fish::class);
    }
}
