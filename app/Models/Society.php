<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    public $timestamps  = true;
    use HasFactory;
    public function user()
    {
        return $this->belongsToMany(User::class, 'members');
    }

}
