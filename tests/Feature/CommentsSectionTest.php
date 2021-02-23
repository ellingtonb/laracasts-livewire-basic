<?php

namespace Tests\Feature;

use App\Http\Livewire\CommentsSection;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CommentsSectionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function main_page_contains_posts()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here!'
        ]);

        $this->get('/')
            ->assertSee($post->title);
    }

    /** @test */
    public function post_page_contains_contact_comments_section_livewire_component()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here!'
        ]);

        $this->get(route('post.show', $post))
            ->assertSeeLivewire('comments-section');
    }

    /** @test */
    public function post_page_contains_content()
    {
        $post = Post::create([
            'title' => 'My Second Post',
            'content' => 'Content of the second post here!'
        ]);

        $this->get(route('post.show', $post))
            ->assertSee($post->content);
    }

    /** @test */
    public function valid_comment_can_be_posted()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here!'
        ]);

        $comment = 'This is my test comment';

        Livewire::test(CommentsSection::class)
            ->set('post', $post)
            ->set('comment', $comment)
            ->call('postComment')
            ->assertSee('Comment was posted!')
            ->assertSee($comment);
    }

    /** @test */
    public function comment_is_required()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here!'
        ]);

        $comment = '';

        Livewire::test(CommentsSection::class)
            ->set('post', $post)
            ->set('comment', $comment)
            ->call('postComment')
            ->assertHasErrors(['comment' => 'required'])
            ->assertSee('The comment field is required');
    }

    /** @test */
    public function comment_requires_min_characters()
    {
        $post = Post::create([
            'title' => 'My First Post',
            'content' => 'Content here!'
        ]);

        $comment = 'hi';

        Livewire::test(CommentsSection::class)
            ->set('post', $post)
            ->set('comment', $comment)
            ->call('postComment')
            ->assertHasErrors(['comment' => 'min'])
            ->assertSee('The comment must be at least 4 characters');
    }
}
