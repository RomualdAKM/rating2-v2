<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;

    protected $append = [
        'formated_date'
    ];

    public function getFormatedDateAttribute(){
        return getFormattedDate($this->created_at);
    }

    public static function generateUniqueMatricule()
        {
            do {
                $prefix = strtoupper(Str::random(1)); // Génère une lettre aléatoire
                $counter = str_pad(Staff::count() + 1, 7, '0', STR_PAD_LEFT); // Génère un numéro séquentiel sur 7 chiffres
                $matricule = $prefix . $counter;
            } while (Staff::where('matriculation', $matricule)->exists());

            return $matricule;
        }

}
