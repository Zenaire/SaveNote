<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Not;

class Polder extends Model
{
    protected $fillable = [
    'user_id',
    'name',
    'thumbnail'
];


public function user()
{
    return $this->belongsTo(User::class);
}

public function notes()
{
    return $this->hasMany(Not::class);
}
}
