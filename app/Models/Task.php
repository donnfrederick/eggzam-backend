<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // Specify the table name if it's not the plural form of the model name
    protected $table = 'tasks';

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'title',
        'description',
        'status',
    ];

    // If you want to disable timestamps like `updated_at`, set $timestamps to false
    public $timestamps = false;

    // Define the default values if needed (optional)
    protected $attributes = [
        'status' => 'Pending',
    ];
}
