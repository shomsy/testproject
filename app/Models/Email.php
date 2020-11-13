<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Email extends Model
{
    use HasFactory;

    protected $fillable = ['address'];

    /**
     * Get user that owns the email.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
