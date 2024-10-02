<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content', 
    ];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value); // Membuat slug berdasarkan title
    }
}
