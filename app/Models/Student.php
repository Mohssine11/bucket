<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model{
    protected $fillable = ['name', 'email', 'image'];

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
