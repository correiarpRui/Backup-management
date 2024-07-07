<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Backup extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'token',
        'name',
        'client_id',
        'description',
        'encryption',
        'passphrase',
        'time',
        'repeat',
        'allowdDays',
    ];


    protected $casts = [
        'allowdDays'=>'array'
    ];

    public function client():BelongsTo{
        return $this->belongsTo(Client::class);
    }

   
    public function reports():HasMany{ 
        return $this->hasMany(Report::class);
    }

    
    

}
