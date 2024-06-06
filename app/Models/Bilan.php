<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bilan extends Model
{
    protected $fillable = [
        'user_id',
        'total_immobilisation',
        'details_immobilisation',
        'total_actif_a_court_terme',
        'details_total_actif_a_court_terme',
        'total_du_capital',
        'details_du_capital',
        'total_du_passif_court_terme',
        'details_du_passif_court_terme'
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
}
