<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $fillable = [
        'book_id',
        'borrower_name',
        'borrower_email',
        'borrowed_at',
        'due_date',
        'returned_at',
    ];

    protected $casts = [
        'borrowed_at' => 'date',
        'due_date' => 'date',
        'returned_at' => 'date',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
