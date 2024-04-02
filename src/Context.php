<?php

namespace silverorange\DevTest;

class Context
{
    public string $title = '';
    public array $posts = [];
    public ?Model\Post $post = null;
    public string $content = '';
}
