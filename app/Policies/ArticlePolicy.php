<?php

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use SebastianBergmann\CodeCoverage\Report\Xml\Report;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user,Article $article): Response
    {
        return $user->role_id===2
        ? Response::allow()
                : Response::deny('Vous n\'avez pas les droits pour voir cette page');
    }
    
    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user , Article $article):Response
    {
        return $user->role_id===2
        ? Response::allow()
                : Response::deny('Vous n\'avez pas les droits pour voir cette page');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user , Article $article): Response
    {
        return $user->role_id===2
        ? Response::allow()
                : Response::deny('Vous n\'avez pas les droits pour creer un article');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Article $article): Response
    {
        return $user->role_id===2
        ? Response::allow()
                : Response::deny('Vous n\'avez pas les droits pour modifier cet article.');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Article $article): Response
    {
        return $user->role_id===2
        ? Response::allow()
                : Response::deny('Vous n\'avez pas les droits pour supprimer cet article. ');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Article $article): Response
    {
        return $user->role_id===2
        ? Response::allow()
                : Response::denyWithStatus(403);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Article $article): Response
    {
        return $user->role_id===2
        ? Response::allow()
                : Response::denyWithStatus(403);
    }
}
