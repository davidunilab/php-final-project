<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    public function personal()
    {
        return $this->hasMany(Personal::class);
    }

    public function academic()
    {
        return $this->hasMany(Academic::class);

    }
}
