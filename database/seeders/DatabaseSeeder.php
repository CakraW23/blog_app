<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $role_user = Role::create(['name' => 'user']);
        $role_admin = Role::create(['name' => 'admin']);


        $user_user = User::create([
            'name' => 'User',
            'email' => 'user@contoh.com',
            'password' => Hash::make('user.user')
        ]);
        

        $user_admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@contoh.com',
            'password' => Hash::make('admin123')
        ]);

        RoleUser::create([
            'role_id' => $role_user->id,
            'user_id' => $user_user->id
        ]);

        RoleUser::create([
            'role_id' => $role_admin->id,
            'user_id' => $user_admin->id
        ]);

        $blog = Blog::create([
            'title' => 'Technology',
            'content' => 'Technology Updates',
            'user_id' => $user_user->id,
            'slug' => 'techblog',
        ]);

        $post = Post::create([
            'title' => 'Contoh',
            'content' => 'Ini Contoh',
            'blog_id' => $blog->id,
            'slug' => 'contoh',
        ]);

        $comment = Comment::create([
            'content' => 'Sangat Baik sangat bermanfaat',
            'user_id' => $user_user->id,
            'post_id' => $post->id,
        ]);
    }
}
