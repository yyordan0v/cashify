<?php

namespace App\Models;

use App\Traits\HasColor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    use HasFactory, HasColor;

    protected $fillable = ['name', 'balance', 'color'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
