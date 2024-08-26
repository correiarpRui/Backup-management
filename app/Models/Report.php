<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'backup_id',
        'name',
        'operation_name',
        'begin_time',
        'end_time',
        'duration',
        'warnings',
        'errors',
    ];

    public function backup():BelongsTo{
        return $this->belongsTo(Backup::class);
    }
}
