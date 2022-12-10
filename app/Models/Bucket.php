<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Bucket extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImageAttribute($value): ?string
    {
        if ($value) {
            return Storage::disk('s3')->url($value);
        }

        return null;
    }
}