<?php

namespace Tests\Feature;

use App\Models\Article;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AjoutBienTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testArticleCreation()
    {
        Storage::fake('public');

        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class)->post('/addarticle', [
            'nom' => 'Article Test',
            'categorie' => 'luxe',
            'user_id' => $user->id,
            'description' => 'Description Test',
            'localisation' => 'test localisation',
            'nombreToilette' => 2,
            'nombreBalcon' => 2,
            'nombreChambre' => 8,
            'dimension' => 100,
            'image' => UploadedFile::fake()->image('article.jpg'),
            'statut' => 'disponible',
            'espaceVert' => 'oui',
        ]);
        // dd($response);
        $response->assertStatus(200);
        $this->assertDatabaseHas('articles', [
            'nom' => 'Article Test',
            'categorie' => 'luxe',
            'user_id' => $user->id,
            'description' => 'Description Test',
            'localisation' => 'test localisation',
        ]);
    }
    public function testlisterBien()
    {
        $biens = Article::all();
        $response = $this->get('/articles/listearticles');
        $response->assertStatus(200);
    }
    public function testsupprimerBien()
    {
        $biens = Article::FindOrFail(4);
        $response = $this->get('/articles/deletearticle/' . $biens->id);
        $response->assertStatus(302);
    }
}
