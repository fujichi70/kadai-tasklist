<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $table = 'tasklist';
    
    protected $fillable = [
        'content',
        'status',
    ];
    
     public function users()
    {
        return $this->belongTo(User::class);
    }
}
