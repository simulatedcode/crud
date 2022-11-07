<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtistCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'type',
    ];

    public function artists()
    {
        return $this->hasMany(Artist::class);
    }
}
