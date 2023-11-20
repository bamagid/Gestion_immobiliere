<?php

namespace App\Models;

use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
    public function comments(){
        return $this->hasmany(Commentaire::class);
    }


    protected $fillable = [
        'nom',
        'categorie',
        'image',
        'description',
        'localisation',
        'statut'
    ];
}
