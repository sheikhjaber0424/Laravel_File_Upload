<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicImg extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function getImageAttribute($value): ?string
    {
        if ($value) {
            return asset('storage/' . $value);
        }

        return null;
    }
}