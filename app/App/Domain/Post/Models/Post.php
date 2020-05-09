<?php

namespace App\Domain\Post\Models;

use App\Domain\User\Models\User;
use App\Domain\Post\Enums\PostStatus;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function isPublished()
    {
      return $this->status === PostStatus::PUBLISHED();
    }

    public function User()
    {
      return $this->belongsTo(User::class);
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }
}
