<?php

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Fish
 * @property int                                      $id
 * @property string                                   $name
 * @property int                                      $speed
 * @property int                                      $satiety
 * @property string                                   $type
 * @property \Illuminate\Database\Eloquent\Collection aquariums
 * @package App\Models
 */
class Fish extends Eloquent
{
    public $timestamps = false;
    public $carpChance = (30/(100+30)); // 0.2307692308

    protected $casts = [
        'speed'   => 'float',
        'satiety' => 'int',
    ];

    protected $fillable = [
        'name',
        'speed',
        'satiety',
        'type',
    ];

    public function aquariums()
    {
        return $this->belongsToMany(\App\Aquarium::class);
    }

    public function eat()
    {
        $this->satiety += 2;
        $this->calculateSpeed();

        return $this;
    }

    public function isCarp()
    {
        return $this->type === 'carp';
    }

    public function isBlockPeanut()
    {
        return mt_rand(0, 9999) < ($this->carpChance * 10000);
    }

    public function calculateSpeed()
    {
        if ($this->satiety < 5) {
            $this->speed += round($this->speed / $this->satiety, 2, PHP_ROUND_HALF_DOWN);
        } else {
            $this->speed = Fish::find($this->id)->speed;
        }
    }
}
