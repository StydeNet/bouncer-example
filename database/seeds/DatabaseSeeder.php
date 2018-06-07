<?php

use App\Comment;
use App\Post;
use App\User;
use Illuminate\Database\Seeder;
use Silber\Bouncer\BouncerFacade as Bouncer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'name' => 'Foo Bar',
            'email' => 'foo@styde.net',
            'password' => bcrypt('secret')
        ]);

        $creatorOfPosts = factory(User::class)->create([
            'name' => 'Creator of Posts',
            'email' => 'creator@styde.net',
            'password' => bcrypt('secret')
        ]);

        /**
         * Este se puede leer como: Le permitimos a los administradores hacer todo.
         */
        Bouncer::allow('admin')->everything();

        /*
         * Le asignamos a este usuario la habilidad de crear nuevos posts.
         */
        $creatorOfPosts->allow('create', Post::class);

        /**
         * Asignamos el rol antes creado al usuario.
         */
        $user->assign('admin');
    }
}
