<?php
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->enum('categorie',['luxe','moyen','abordable']);
            $table->text('description');
            $table->string('image');
            $table->string('localisation');
            $table->enum('statut',['occupé', 'disponible']);
            $table->integer('nombreToilette');
            $table->integer('nombreBalcon')->default(0);
            $table->integer('dimension');
            $table->integer('nombreChambre');
            $table->enum('espaceVert', ['oui', 'non']);
            $table->boolean('is_deleted')->default(false);
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
