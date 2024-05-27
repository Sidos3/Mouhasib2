<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_immobilisee',
        'details_immobilisee',
        'total_circulants',
        'details_circulants',
        'capital_propre',
        'details_propre',
        'total_passifs',
        'details_passifs',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
