<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
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
        'admin_id',
    ];

    public function getStatusEnumAttribute()
    {
        return TaskStatusEnum::from($this->status);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
