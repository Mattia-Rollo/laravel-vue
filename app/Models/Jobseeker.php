<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Jobseeker extends Model
{

    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function education(): HasMany
    {
        return $this->hasMany(Education::class);
    }
    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }
}