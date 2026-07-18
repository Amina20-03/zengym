<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrancheSociete extends Model
{
    use HasFactory;
    protected $fillable = [
        'raison_sociale',
        'capitale',
        'Adresse',
        'telephone_fixe',
        'fax',
        'id_soc',
    ];
}
