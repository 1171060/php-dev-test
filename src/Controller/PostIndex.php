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
    $sql = 'SELECT p.id, p.title, p.body, p.created_at, p.modified_at, a.full_name as author_name FROM posts p INNER JOIN authors a ON p.author = a.id ORDER BY p.created_at DESC';

    // Execute the query and fetch results
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    $postsData = $stmt->fetchAll();


    $this->posts = [];
    foreach ($postsData as $postData) {
        $post = new \silverorange\DevTest\Model\Post();
        $post->id = $postData['id'];
        $post->title = $postData['title'];
        
        $post->body = \Michelf\Markdown::defaultTransform($postData['body']);
        $post->created_at = $postData['created_at'];
        $post->modified_at = $postData['modified_at'];
        $post->author = $postData['author_name'];
        
        $this->posts[] = $post; 
    }
}
}