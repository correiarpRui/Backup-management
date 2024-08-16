<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Backup extends Model
{
    use HasFactory, CreatedUpdatedBy;

    protected $fillable = [
        'created_by',
        'updated_by',
        'token',
        'name',
        'client_id',
        'description',
        'encryption',
        'passphrase',
        'time',
        'repeat',
        'allowedDays',
    ];


    protected $casts = [
        'allowedDays'=>'array'
    ];

    public function client():BelongsTo{
        return $this->belongsTo(Client::class);
    }

   
    public function reports():HasMany{ 
        return $this->hasMany(Report::class);
    }

    public function createdBy():BelongsTo{
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy():BelongsTo{
        return $this->belongsTo(User::class, 'updated_by');
    }
    
    

}
