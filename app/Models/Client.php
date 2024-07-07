<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'contact',
        'email',
        'user_id'
    ];

    public function user():BelongsToMany{
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function backups(): HasMany{
        return $this->hasMany(Backup::class);
    }
}
