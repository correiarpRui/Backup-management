<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Backup extends Model
{
    use HasFactory;

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
