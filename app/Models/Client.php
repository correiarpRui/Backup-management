<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory, CreatedUpdatedBy;

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

    public function createdBy(): BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function updatedBy(): BelongsTo{
        return $this->belongsTo(User::class, 'updated_by')->withDefault(['updated_by'=>0]);
    }
}
