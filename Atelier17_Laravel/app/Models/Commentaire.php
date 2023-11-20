<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    public function comments(){
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'contenu',
        'user_id',
        'admin_id',
        'article_id',
        'is_delete',
    ];

}
