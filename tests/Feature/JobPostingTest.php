<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Domain\User\Models\User;
use App\Domain\Post\Models\Post;
use Tests\TestCase;

class JobPostingTest extends TestCase
{
    use RefreshDatabase;

    function testLoggedInUserCanPostJob()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)->post('/posts', [
            'title' => 'This is job title',
            'description' => 'This is the job description'
        ]);

        tap(Post::first(), function ($post) use ($response, $user) {
            $response->assertStatus(302);
            $response->assertRedirect(route('posts.index'));

            $this->assertfalse($post->isPublished());
            $this->assertTrue($post->user->is($user));

            $this->assertEquals('This is job title', $post->title);
            $this->assertEquals('This is the job description', $post->description);
        });
    }
}
