<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Publication extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title', 'authors', 'year', 'venue',
        'doi', 'url', 'type', 'abstract',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
        ];
    }
}
