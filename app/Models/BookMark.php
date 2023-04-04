<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookMark extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    // pada model User

// pada model Bookmark
public function user()
{
    return $this->belongsTo(User::class);
}

}
