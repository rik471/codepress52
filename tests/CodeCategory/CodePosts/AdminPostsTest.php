<?php

namespace CodePress\CodeCategory\Testing;

use CodePress\CodePosts\Models\Post;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminPostsTest extends \TestCase
{
    use DatabaseTransactions;

    public function test_can_visit_admin_posts_page()
    {
        $this->visit('/admin/posts')
            ->see('Posts');
    }

    public function test_posts_listing()
    {
        Post::create(['title' => 'Post 1', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 2', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 3', 'content' => 'Conteudo do meu post']);
        Post::create(['title' => 'Post 4', 'content' => 'Conteudo do meu post']);

        $this->visit('/admin/posts')
            ->see('Post 1')
            ->see('Post 2')
            ->see('Post 3')
            ->see('Post 4');

    }

    public function test_click_create_new_post()
    {
        $this->visit('/admin/posts')
            ->click("Create Post")
            ->seePageIs('/admin/posts/create')
            ->see('Create Post');
    }

    public function test_click_edit_a_post()
    {
        $post = Post::create(['title'=>'Post 1', 'content'=>'Conteudo do meu post']);
        $id = $post->id;
        $idMenosUm = $id - 1;
        $this->visit('/admin/posts/')
            ->click("link_edit_post_$id")
            ->seePageIs("/admin/posts/$idMenosUm/edit")
            ->see('Edit Post');
    }

    public function test_update_a_post()
    {
        $post = Post::create(['title'=>'Post 1', 'content'=>'Conteudo do meu post']);
        $this->visit("/admin/posts/{$post->id}/edit")
            ->type('Post Alterado', 'title')
            ->type('Conteudo do meu post', 'content')
            ->press('Submit')
            ->seePageIs('/admin/posts')
            ->see('Post Alterado')
            ->see('Conteudo do meu post');
    }

}