<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function addExperience(float $experiencePoints)
    {
        $this->increment('experience', $experiencePoints);
    }
}