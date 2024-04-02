<?php

namespace silverorange\DevTest\Controller;

use silverorange\DevTest\Context;
use silverorange\DevTest\Template;

class PostIndex extends Controller
{
    private array $posts = [];

    public function getContext(): Context
    {
        $context = new Context();
        $context->title = 'Posts';
        $context->posts = $this->posts;
        return $context;
    }

    public function getTemplate(): Template\Template
    {
        return new Template\PostIndex();
    }

    protected function loadData(): void
    {
         $stmt = $this->db->prepare('SELECT p.id, p.title, a.full_name AS author_name FROM posts p INNER JOIN authors a ON p.author = a.id  ORDER BY p.created_at DESC');
        $stmt->execute();
        $posts = $stmt->fetchAll();
        $this->posts = [];
        foreach ($posts as $postData) {
                $post = new \silverorange\DevTest\Model\Post();
                $post->id = $postData['id'];
                $post->title = $postData['title'];
                $post->author = $postData['author_name'];
                $this->posts[] = $post; 
            }
        }
}