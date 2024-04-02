<?php

namespace silverorange\DevTest\Template;

use silverorange\DevTest\Context;
use Michelf\Markdown;

class PostDetails extends Layout
{
    protected function renderPage(Context $context): string
    {
        // @codingStandardsIgnoreStart
       
   if (isset($context->post->id)) {
            $title = htmlspecialchars($context->post->title);
            $body = Markdown::defaultTransform($context->post->body);
            $author = htmlspecialchars($context->post->author);

            return <<<HTML
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>{$title}</title>
            </head>
            <body>
                <article>
                    <h1 class="article_title">{$title}</h1>
                    <section>{$body}</section>
                    <footer>Author: {$author}</footer>
                </article>
            </body>
            </html>
            HTML;
                    } else {
                        return "<p>Post not found.</p>";
                    }
        // @codingStandardsIgnoreEnd
    }
}
