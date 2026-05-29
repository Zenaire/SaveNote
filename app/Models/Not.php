<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Not extends Model
    {
        protected $table = 'notes';
        protected $fillable = [
        'user_id',
        'folder_id',
        'category_id',
        'title',
        'subtitle',
        'content',
        'media'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function folder()
    {
        return $this->belongsTo(Polder::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Kategori::class);
    }
}
