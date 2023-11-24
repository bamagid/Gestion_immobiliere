<?php

namespace App\Models;

use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments(){
        return $this->hasmany(Commentaire::class);
    }
    public function chambres(){
        return $this->hasMany(Chambre::class);
    }

    

    protected $fillable = [
        'nom',
        'categorie',
        'image',
        'description',
        'localisation',
        'statut',
        'toilette',
        'balcon',
        'dimension',
        'chambre',
        'espace_vert',
        'user_id',

    ];
}
