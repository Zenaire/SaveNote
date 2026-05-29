<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    public function notes()
    {
        return $this->hasMany(Not::class);
    }
}
