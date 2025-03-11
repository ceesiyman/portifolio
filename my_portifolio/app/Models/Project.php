<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'tech_stack', 'image', 'github_link', 'live_link'
    ];

    protected $casts = [
        'tech_stack' => 'array',
    ];
}
