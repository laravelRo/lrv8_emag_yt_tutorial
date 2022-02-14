<?php

namespace App\View\Components\content;

use Illuminate\View\Component;
use App\Models\content\Section;

class SectionsList extends Component
{
    public $showMenu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($showMenu)
    {
        $this->showMenu = $showMenu;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $sections = Section::withCount('products')
            ->where('active', true)
            ->orderBy('position')
            ->get();


        return view('components.content.sections-list')
            ->with('sections_menu', $sections);
    }
}
