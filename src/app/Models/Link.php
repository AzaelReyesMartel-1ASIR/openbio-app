<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    // Deactivated mass assignment protection
    protected $guarded = [];

    // Inverse relationship: A link belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
