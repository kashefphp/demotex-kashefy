<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailName extends Model
{
    use HasFactory;

    public function details()
    {
        return $this->hasMany(Detail::class, 'id', 'key_id');
    }
}
