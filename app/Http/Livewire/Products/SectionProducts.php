<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\content\Brand;
use App\Models\content\Product;
use App\Models\content\Attribute;
use League\CommonMark\Extension\CommonMark\Renderer\Block\ThematicBreakRenderer;

class SectionProducts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $section;

    public $orderItem = "name";

    public $searchItem = "";

    public $attributes;

    public $brands;


    public $filteredValues = [];
    public $filteredBrands = [];




    public function mount()
    {

        $this->attributes = $this->section->publicAttributes();
        $this->brands = Brand::select('id', 'name')->whereHas('products', function ($qry) {
            $qry->select('brand_id');
            $qry->where('section_id', $this->section->id);
        })->orderBy('name')->get();
    }

    public function restoreSearch()
    {
        $this->resetPage();
        $this->searchItem = "";
    }

    public function resetFilters()
    {
        $this->searchItem = "";
        $this->filteredBrands = [];
        $this->filteredValues = [];
        $this->resetPage();
    }



    public function render()
    {


        $products = Product::query();

        $products = $products->where('section_id', $this->section->id);



        //cautarea dupa numele produsului
        if (strlen($this->searchItem) > 3) {
            $products = $products->where('name', 'LIKE', "%$this->searchItem%");
        }



        //filtrarea produselor dupa branduri
        if ($this->filteredBrands) {
            $products = $products->whereIn('brand_id', $this->filteredBrands);
        }

        //sortarea produselor dupa diverse criterii
        $products = $products->orderBy(
            str_replace('_desc', '', $this->orderItem),
            str_contains($this->orderItem, '_desc') ? 'DESC' : 'ASC'
        );

        $products = $products->paginate(12);


        //filtrarea produselor dupa valorile atributelor
        if ($this->filteredValues) {
            //gasim atributele care au valori selectate
            $attributes = $this->section->attributes()->whereHas('values', function ($query) {
                $query->whereIn('name', $this->filteredValues);
            })->get();

            //gasim produsele comune tuturor atributelor
            //vom gasi produsele fiecarui atribut in parte si vom intersecta colectiile

            foreach ($attributes as $key => $attribute) {
                if ($key == 0) {
                    $products = $attribute->products()->wherePivotIn('value', $this->filteredValues)
                        ->where('section_id', $this->section->id)
                        ->get();
                } else {
                    //produsele din primul atribut care nu fac parte din urmatorul atribut
                    //folosim functia diff a colectiilor laravel
                    $currentDiff = $products->diff($attribute->products()->wherePivotIn('value', $this->filteredValues)
                        ->where('section_id', $this->section->id)
                        ->get());
                    //obtinem produsele comune celor doua atribute (pe baza valorilor)
                    $products = $products->diff($currentDiff);
                }
            }

            if ($this->filteredBrands) {
                $products = $products->whereIn('brand_id', $this->filteredBrands);
            }



            if (str_contains($this->orderItem, '_desc')) {

                $products = $products->sortByDesc(str_replace('_desc', '', $this->orderItem));
            } else {
                $products = $products->sortBy($this->orderItem);
            }


            if (strlen($this->searchItem) > 3) {
                $this->searchItem = "";
            }


            $products = $products->paginate(12);
        }

        // resetarea paginatiei
        $this->resetPage();

        return view('livewire.products.section-products')
            ->with('products', $products);
    }
}
