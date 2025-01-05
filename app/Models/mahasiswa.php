<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class mahasiswa extends Model
{
    public function jurusan(): HasOne
    {
        return $this->hasOne(Jurusan::class, 'id');
    }
}
