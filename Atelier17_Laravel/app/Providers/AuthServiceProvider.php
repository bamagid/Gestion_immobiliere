<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Article;
use App\Models\Chambre;
use App\Models\Commentaire;
use App\Models\User;
use App\Policies\ArticlePolicy;
use App\Policies\CommentairePolicy;
use App\Policies\ChambrePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Article::class => ArticlePolicy::class,
        Commentaire::class => CommentairePolicy::class,
        User::class => UserPolicy::class,
        Chambre::class => ChambrePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
