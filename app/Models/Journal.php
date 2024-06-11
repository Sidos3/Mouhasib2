<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;
    protected $fillable=['compte_debit',
    'compte_credit',
    'emplois',
    'date',
    'ressources',
    'montant_debit',
    'montant_credit'];
}
