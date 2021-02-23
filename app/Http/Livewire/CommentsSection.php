<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class CommentsSection extends Component
{
    public ?Post $post = null;
    public ?string $comment = null;
    public ?string $successMessage = null;

    protected array $rules = [
        'post' => 'required',
        'comment' => 'required|min:4'
    ];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function postComment()
    {
        $this->validate();

        Comment::create([
            'post_id' => $this->post->id,
            'username' => 'Guest',
            'content' => $this->comment,
        ]);

        $this->resetForm();

        $this->successMessage = 'Comment was posted!';
    }

    private function resetForm()
    {
        $this->post = Post::find($this->post->id);
        $this->comment = '';
    }

    public function render()
    {
        return view('livewire.comments-section');
    }
}
