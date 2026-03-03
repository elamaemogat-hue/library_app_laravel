<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'author',
        'isbn',
        'description',
        'available',
    ];

    protected $casts = [
        'available' => 'boolean',
    ];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

    public function activeBorrow()
    {
        return $this->hasOne(Borrow::class)->whereNull('returned_at');
    }
}
