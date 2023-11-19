<?php

namespace App\Models;

use Egulias\EmailValidator\Parser\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    public function articles(){
        return $this->hasMany(Article::class);
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];
}
