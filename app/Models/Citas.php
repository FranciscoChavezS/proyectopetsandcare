<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;
    protected $fillable = ['nombremas','razamas','sexomas','telefonomas','caso','started_at','hora'];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

