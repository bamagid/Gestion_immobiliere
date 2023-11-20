<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function admin(){
        return $this->belongsTo(Admin::class);
    }

    protected $fillable = [
        'nom',
        'categorie',
        'image',
        'description',
        'localisation',
        'statut',
        'admin_id',
    ];
}
