<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'due_date',
        'status',
        'user_id',
        'decription',
        'category',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
