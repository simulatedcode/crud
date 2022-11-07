<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname',
        'bod',
        'dod',
        'is_active',
    ];

    protected $casts = [
        'bod' => 'date',
        'dod' => 'date',
        'is_active' => 'boolean',
    ];

    public function categories()
    {
        return $this->belongsTo(ArtistCategory::class);
    }
}
