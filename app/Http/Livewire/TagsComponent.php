<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Livewire\Component;

class TagsComponent extends Component
{
    public string $tags;

    protected $listeners = [
         'tagAdded',
         'tagRemoved'
    ];

    public function mount()
    {
        $allTags = Tag::all();

        $this->tags = json_encode($allTags->pluck('name'));
    }

    public function tagAdded(string $tag)
    {
        Tag::create(['name' => $tag]);

        $this->emit('tagAddedFromBackend', $tag);
    }

    public function tagRemoved(string $tag)
    {
        Tag::where('name', $tag)->first()->delete();

        $this->emit('tagRemovedFromBackend', $tag);
    }

    public function render()
    {
        return view('livewire.tags-component');
    }
}
