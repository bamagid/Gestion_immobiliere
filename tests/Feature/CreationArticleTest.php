<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Article;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreationArticleTest extends TestCase
{
     /** @test */
     public function admin_can_create_article()
     {
         $admin= User::factory()->create(['role' => 'admin']);
      
         $response = $this->actingAs($admin)->get('/articles/create');
         $response->assertSuccessful();
      
         $expectedAttributes = [
             'nom' => 'Studio',
             'categorie' => 'niveau2',
             'image' => 'images.jpg',
             'description' =>'2 chambres salon',
             'localisation' => 'aux alladies',
             'statut' => 'disponible',
             'toilette' => '2toilettes',
             'balcon' => 'non',
             'dimension' => '350m',
             'chambre' => '2',
             'espace_vert'=> 'non',
             'user_id' =>''
         ];
      
         $response = $this->actingAs($admin)->post('/articles', $expectedAttributes);
         $response->assertRedirect('/articles/1');
      
         $expectedAttributes['user_id'] = $admin->id;
         $this->assertDatabaseHas(Article::class, $expectedAttributes);
     }
}
