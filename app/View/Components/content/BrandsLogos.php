<?php

namespace App\View\Components\content;

use App\Models\content\Brand;
use Illuminate\View\Component;

class BrandsLogos extends Component
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
        // $logos = [];

        // $brands = Brand::all()->where('active', true);
        // foreach ($brands as $key => $brand) {
        //     $logos[] = ['url' => $brand->photoUrl(), 'slug' => $brand->slug];
        // }
        // $logos = collect($logos);

        $brands = Brand::all('photo', 'slug', 'active')->where('active', true);

        return view('components.content.brands-logos')
            // ->with('logos', $logos);
            ->with('brands', $brands);
    }
}
