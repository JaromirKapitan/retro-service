<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

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
