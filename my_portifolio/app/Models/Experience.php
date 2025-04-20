<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'title',
        'organization',
        'company',
        'role',
        'start_date',
        'end_date',
        'description',
        'skills'
    ];

    protected $casts = [
        'skills' => 'array',
        'start_date' => 'date',
        'end_date' => 'date'
    ];
}
