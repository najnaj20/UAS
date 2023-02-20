<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'solution_name',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
