<?php

namespace App\Domain\Post\Actions;

use App\Domain\Post\Models\Post;
use App\Domain\User\Models\User;
use App\Domain\Post\Enums\PostStatus;

class CreatePostAction
{
    public function execute(User $user, array $attributes): Post
    {
        $post = new Post;
        $post->title = $attributes['title'];
        $post->user_id = $user->id;
        $post->description = $attributes['description'];
        $post->setStatus(PostStatus::UNPUBLISHED());
        $post->save();

        return $post;
    }
}
