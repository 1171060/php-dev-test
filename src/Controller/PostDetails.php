<?php

namespace silverorange\DevTest\Controller;

use silverorange\DevTest\Context;
use silverorange\DevTest\Template;
use silverorange\DevTest\Model;
use Michelf\Markdown;

class PostDetails extends Controller
{
    private ?Model\Post $post = null;

    public function getContext(): Context
    {
        $context = new Context();

       if ($this->post === null) {
        $context->title = 'Not Found';
        $context->content = "A post with id {$this->params[0]} was not found.";
    } else {
        $context->title = $this->post->title;
        $context->post = $this->post; 
    }

        return $context;
    }

    public function getTemplate(): Template\Template
    {
        if ($this->post === null) {
            return new Template\NotFound();
        }
        return new Template\PostDetails();
    }

    public function getStatus(): string
    {
        if ($this->post === null) {
            return $_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found';
        }
        return $_SERVER['SERVER_PROTOCOL'] . ' 200 OK';
    }

    protected function loadData(): void {
    
        $postId = $this->params[0] ?? null;

    if ($postId) {
            $stmt = $this->db->prepare('SELECT p.*, a.full_name AS author_name FROM posts p INNER JOIN authors a ON p.author = a.id WHERE p.id = ?');
            $stmt->execute([$postId]);
                $postData = $stmt->fetch();
                if ($postData) {
                    $this->post = new Model\Post(); 
                    $this->post->id = $postData['id'];
                    $this->post->title = $postData['title'];
                    $this->post->body = Markdown::defaultTransform($postData['body']);
                    $this->post->created_at = $postData['created_at'];
                    $this->post->modified_at = $postData['modified_at'];
                    $this->post->author = $postData['author_name'];
                }
        }
    }
}