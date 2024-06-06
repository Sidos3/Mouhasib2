<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Assuming you want to associate a fournisseur with a user
        'full_name',
        'NNI',
        'cle_de_paye',
        'numero_telephone',
        'company_name',
        'date_naissance',
        'ville',
        'adresse'
    ];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Create a fournisseur record for a given user
    public static function createForUser(User $user, array $data)
    {
        return $user->fournisseurs()->create($data);
    }
}

