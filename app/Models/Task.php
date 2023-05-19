<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'todo_id',
        't_name',
        'due_date',
        'due_time',
    ];

    /**
     * Get the user that owns the Task
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function todolist()
    {
        return $this->belongsTo(Todolist::class, 'todo_id', 'id');
    }

    public function isOverdue()
    {
        return Carbon::parse($this->due_date)->isPast();
    }
}
