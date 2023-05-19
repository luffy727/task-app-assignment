<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

  
    public function tasks()
    {
        return $this->hasMany(Task::class, 'todo_id', 'id');
    }
}
