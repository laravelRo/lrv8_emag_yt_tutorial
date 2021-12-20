<?php

namespace App\View\Components\content;

use App\Models\content\Brand;
use Illuminate\View\Component;

class PromoBrands extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $brands = Brand::all('name', 'title', 'active', 'photo')->random(2)->where('active', true);
        return view('components.content.promo-brands')
            ->with('brands', $brands);
    }
}
