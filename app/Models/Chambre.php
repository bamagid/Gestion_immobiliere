<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;
    public function article(){
        return $this->belongsTo(Article::class);
    }

    protected $fillable = [
        'dimension',
        'image',
        'typeChambre',
        'article_id',
    ];
}
