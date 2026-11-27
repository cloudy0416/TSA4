<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'status',
        'is_archived',
    ];

    protected function casts(): array
    {
        return [
            'due_date' => 'date',
            'is_archived' => 'boolean',
        ];
    }

    // A task belongs to one user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
