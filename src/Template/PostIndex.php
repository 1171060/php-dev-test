<?php

namespace silverorange\DevTest\Template;

use silverorange\DevTest\Context;
use Michelf\Markdown;

class PostIndex extends Layout
{
    protected function renderPage(Context $context): string
    {
        // @codingStandardsIgnoreStart
        $html = '<h1 class="posts_page">POSTS</h1>';
if (!empty($context->posts)) {
            foreach ($context->posts as $post) {
                $bodyHtml = Markdown::defaultTransform($post->body);
                $html .= <<<POST
                    <div class="post">
                        <h1 style="border-bottom:solid 5px #ff0000;">{$post->title}</h1>
                        <div>{$bodyHtml}</div>
                        <p>Author: {$post->author}</p>
                    </div>
                    POST;
                    }
                    } else {
                                $html .= '<p>No posts found.</p>';
                    }
         return <<<HTML
    <html>
    <head>
        <title>Post Index</title>
    </head>
    <body>
        $html
    </body>
    </html>
    HTML;
        // @codingStandardsIgnoreEnd
    }
}