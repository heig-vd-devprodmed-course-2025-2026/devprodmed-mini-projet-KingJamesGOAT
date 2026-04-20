<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function () {
            // Création des catégories sur le thème des échecs
            $catOuverture = Category::create(['name' => 'Ouverture']);
            Category::create(['name' => 'Milieu de jeu']);
            Category::create(['name' => 'Finale']);
            Category::create(['name' => 'Tactique']);

            // Créer deux utilisateurs
            $user1 = new User();
            $user1->first_name = 'Alice';
            $user1->last_name = 'Smith';
            $user1->username = 'alicesmith';
            $user1->email = 'alice@example.com';
            $user1->password = Hash::make('password1234');
            $user1->save();

            $user2 = new User();
            $user2->first_name = 'Bob';
            $user2->last_name = 'Jones';
            $user2->username = 'bobjones';
            $user2->email = 'bob@example.com';
            $user2->password = Hash::make('password1234');
            $user2->save();

            // Créer un post pour le premier utilisateur
            $post = new Post();
            $post->title = 'Hello World';
            $post->content = 'Ceci est le premier post généré par le seeder.';
            $post->category_id = $catOuverture->id; // Assignation de la catégorie
            $user1->posts()->save($post);

            // Attacher un like du second utilisateur au post
            $user2->likes()->attach($post->id, ['reaction' => 'like']);
        });
    }
}
