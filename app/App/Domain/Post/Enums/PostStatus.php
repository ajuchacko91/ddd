<?php

namespace App\Domain\Post\Enums;

use MyCLabs\Enum\Enum;

class PostStatus extends Enum {
    const PUBLISHED = 'published';
    const UNPUBLISHED = 'unpublished';
}
