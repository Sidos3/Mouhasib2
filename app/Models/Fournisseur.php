<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = [
        'full_name','NNI', 'cle_de_paye', 'numero_telephone', 'company_name', 'date_naissance', 'ville',
        'adresse'
    ];
    use HasFactory;
}
