<?php

namespace App;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Aquarium
 * @property int                                      $id
 * @property string                                   $name
 * @property int                                      $peanuts
 * @property \Illuminate\Database\Eloquent\Collection $fish
 * @package App\Models
 */
class Aquarium extends Eloquent
{
    protected $table      = 'aquarium';
    public    $timestamps = false;

    protected $casts = [
        'peanuts' => 'int',
    ];

    protected $fillable = [
        'name',
        'peanuts',
    ];

    public function fish()
    {
        return $this->belongsToMany(\App\Fish::class);
    }
}
