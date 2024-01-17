<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreerBienTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testAddBien()
    {
        $this->withoutMiddleware();
        // Je crée un utilisateur connecté pour les tests
        $user = User::factory()->create(['role_id' => 1]);
        
        $imageBien = UploadedFile::fake()->image('article.jpg');
        
        $this->actingAs($user);
        
        // Je crée des données d'articles fictives
        $bienData = [
            'nom' => 'Bien Immobilier',
            'categorie' => 'luxe',
            'image' => $imageBien,
            'description' => 'Ceci est un article de test',
            'localisation' => 'Dakar',
            'statut' => 'disponible',
            'nombreToilette' => 2,
            'nombreBalcon' => 1,
            'dimension' => 100,
            'nombreChambre' => 3,
            'espaceVert' => 'oui'
        ];

        // Faire une requête POST à la route '/addarticle'
        $response = $this->post('/addarticle', $bienData);

        // Vérifiez que la requête a réussi
        $response->assertCreated(201);
    }
}
