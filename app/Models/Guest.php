<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    public $timestamp = true;
    use HasFactory;
    public function events()
    {
        return $this->belongsToMany(Event::class, 'takenbies');
    }
}
