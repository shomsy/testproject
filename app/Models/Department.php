<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * Get the users for the department.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
