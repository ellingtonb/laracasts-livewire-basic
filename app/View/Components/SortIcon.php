<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SortIcon extends Component
{
    public $field;
    public $sortField;
    public $sortAsc;

    /**
     * Create a new component instance.
     *
     * @param string|null $field
     * @param string|null $sortField
     * @param bool|null $sortAsc
     */
    public function __construct(?string $field, ?string $sortField, ?bool $sortAsc)
    {
        $this->field = $field;
        $this->sortField = $sortField;
        $this->sortAsc = $sortAsc;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.sort-icon');
    }
}
