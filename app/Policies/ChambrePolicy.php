<?php

namespace App\Policies;

use App\Models\Chambre;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ChambrePolicy
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
    public function view(User $user, Chambre $chambre): Response
    {
        return $user->id===$chambre->article->user_id ?
            Response::allow()
            : Response::deny('Vous n\'avez pas le droit de modifier cette chambre car vous n\êtes pas le propretaire du bien')
        ;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user,Chambre $chambre)
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chambre $chambre): Response
    {
        return $user->id===$chambre->article->user_id?
        Response::allow()
        : Response::deny('Vous n\'avez pas le droit de modifier cette chambre car vous n\êtes pas le propretaire du bien');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chambre $chambre):Response
    {
        return $user->id===$chambre->article->user_id?
        Response::allow()
        : Response::deny('Vous n\'avez pas le droit de chambre cette chambre car vous n\êtes pas le propretaire du bien');
        
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chambre $chambre): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chambre $chambre): bool
    {
        return false;
    }
}
