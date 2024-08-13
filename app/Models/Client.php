<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\UserStamps;

class Client extends Model
{
    use HasFactory, UserStamps;

    protected $fillable = [
        'name',
        'address',
        'contact',
        'email',
        'created_by',
        'updated_by'
    ];

    public function users():BelongsToMany{
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function backups(): HasMany{
        return $this->hasMany(Backup::class);
    }
}
