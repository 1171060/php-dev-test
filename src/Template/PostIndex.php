<?php
namespace silverorange\DevTest\Template;

use silverorange\DevTest\Context;
use Michelf\Markdown;

class PostIndex extends Layout
{
    protected function renderPage(Context $context): string
    {
        // @codingStandardsIgnoreStart
    $html = '<ul>';
        foreach ($context->posts as $post) {
            $title = htmlspecialchars($post->title);
            $author = htmlspecialchars($post->author);
            $postId = htmlspecialchars($post->id);
            $html .= "<li><a href='/posts/{$postId}'>{$title}</a> by {$author}</li>";
        }
        $html .= '</ul>';
        return $html;
        // @codingStandardsIgnoreEnd
    }
}