<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'backup_id',
        'duplicati_index',
        'name',
        'operation_name',
        'begin_time',
        'end_time',
        'duration',
        'warnings',
        'errors',
        'log'
    ];

    protected function log(): Attribute{
        return Attribute::make(
            get: fn ($value)=>json_decode($value, true),
            set: fn ($value)=>json_encode($value)
        );
    }

    public function backup():BelongsTo{
        return $this->belongsTo(Backup::class);
    }
}
