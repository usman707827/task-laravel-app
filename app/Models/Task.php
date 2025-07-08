<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

       protected $fillable = [
        'title',
        'description',
        'due_date',
        'status',
        'user_id'
    ];

    protected $casts = [
        'due_date' => 'date'
    ];

      public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusBadgeClass()
    {
        return match($this->status) {
            'pending' => 'badge-warning',
            'in_progress' => 'badge-info',
            'completed' => 'badge-success',
            default => 'badge-secondary'
        };
    }
}
