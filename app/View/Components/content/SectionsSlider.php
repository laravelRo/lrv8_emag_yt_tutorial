<?php

namespace App\View\Components\content;

use Illuminate\View\Component;
use App\Models\content\Section;

class SectionsSlider extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $promo;
    public $active;

    public function __construct($promo, $active)
    {
        $this->promo = $promo;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $sections = Section::where('promo', $this->promo)
            ->where('active', $this->active)
            ->orderBy('position')
            ->get();

        return view('components.content.sections-slider')
            ->with('sections', $sections);
    }
}
