<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Post;

class PostIntegrationTest extends TestCase
{

    use DatabaseTransactions;

    public function test_a_slug_is_generated_and_saved_to_the_database()
    {

        $post = $this->createPost([
            'title' => 'Como instalar Laravel'
        ]);

        $this->assertSame('como-instalar-laravel', $post->fresh()->slug);

    }

    public function test_the_url_of_the_post_is_generated()
    {

        $user = $this->defaultUser();
        $post = factory(Post::class)->make();
        $user->posts()->save($post);

        $this->assertSame(
            $post->url,
            route('posts.show', [$post->id, $post->slug])
        );

    }

}
