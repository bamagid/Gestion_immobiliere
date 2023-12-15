<?php

namespace App\Policies;

use App\Models\Commentaire;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CommentairePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
       return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Commentaire $commentaire): Response
    {
        return $user->id===$commentaire->user_id
        ? Response::allow()
                : Response::deny('Vous n\'avez pas les droits pour voir cette page');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Commentaire $commentaire): Response
    {
        return $user->role_id===1
        ? Response::allow()
                : Response::deny('Vous n\'avez pas les droits pour faire un commentaire. '); ;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Commentaire $commentaire): Response
    {
        return $user->id===$commentaire->user_id 
        ? Response::allow()
                : Response::deny('Vous n\'avez pas les droits pour modifier ce commentaire. ');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Commentaire $commentaire): Response
    {
        return $user->id === $commentaire->user_id ||  $user->role_id===1
        ? Response::allow()
                : Response::deny('Vous n\'avez pas les droits pour supprimer ce commentaire. ');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Commentaire $commentaire): Response
    {
        return $user->role_id===2
        ? Response::allow()
                : Response::denyWithStatus(403);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Commentaire $commentaire): Response
    {
        return $user->role_id===2
        ? Response::allow()
                : Response::denyWithStatus(403);
    }
}
