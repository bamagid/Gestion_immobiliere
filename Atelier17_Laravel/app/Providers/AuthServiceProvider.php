<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Article;
use App\Models\Commentaire;
use App\Policies\ArticlePolicy;
use App\Policies\CommentairePolicy;
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
