<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $limit = 10;

    public $search = '';

    public $searchResults = [];

    public function updatedSearch($newValue)
    {
        if (strlen($this->search) < 3) {
            $this->searchResults = [];
            return;
        }

        $response = Http::get(
            'https://itunes.apple.com/search/?term=' . $this->search . '&limit=' . $this->limit
        );

        if (!empty($response['resultCount']) && isset($response['results'])) {
            $this->searchResults = $response['results'];
        }
    }

    public function render()
    {
        return view('livewire.search-dropdown');
    }
}
