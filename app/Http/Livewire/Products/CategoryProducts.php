<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use App\Models\content\Brand;
use Livewire\WithPagination;

class CategoryProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category;
    public $attributes;

    public $brands;
    public $filteredBrands = [];

    public $orderItem = "name";

    public $searchItem = "";

    public $filteredValues = [];


    public function mount()
    {
        $this->attributes = $this->category->section->publicAttributes();
        $this->brands = Brand::select('id', 'name')->whereHas(
            'products',
            function ($query) {
                $query->whereHas('categories', function ($qry) {
                    $qry->where('id', $this->category->id);
                });
            }
        )
            ->orderby('name')
            ->get();
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
        $products = $this->category->products();



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
            $attributes = $this->category->section->attributes()->whereHas('values', function ($query) {
                $query->whereIn('name', $this->filteredValues);
            })->get();

            //gasim produsele comune tuturor atributelor
            //vom gasi produsele fiecarui atribut in parte si vom intersecta colectiile

            foreach ($attributes as $key => $attribute) {
                if ($key == 0) {
                    $products = $attribute->products()->wherePivotIn('value', $this->filteredValues)
                        ->whereHas('categories', function ($query) {
                            $query->where('id', $this->category->id);
                        })
                        ->get();
                } else {
                    //produsele din primul atribut care nu fac parte din urmatorul atribut
                    //folosim functia diff a colectiilor laravel
                    $currentDiff = $products->diff($attribute->products()->wherePivotIn('value', $this->filteredValues)
                        ->whereHas('categories', function ($query) {
                            $query->where('id', $this->category->id);
                        })
                        ->get());
                    //obtinem produsele comune celor doua atribute (pe baza valorilor)
                    $products = $products->diff($currentDiff);
                }
            }

            //aplicam filtrele de brand
            if ($this->filteredBrands) {
                $products = $products->whereIn('brand_id', $this->filteredBrands);
            }

            //aplicam criteriile de sortare
            if (str_contains($this->orderItem, '_desc')) {

                $products = $products->sortByDesc(str_replace('_desc', '', $this->orderItem));
            } else {
                $products = $products->sortBy($this->orderItem);
            }

            //resetam termenul de cautare
            if (strlen($this->searchItem) > 3) {
                $this->searchItem = "";
            }

            $products = $products->paginate(12);
        }
        //end foreach - filtrarea dupa valorile atributelor

        // resetarea paginatiei
        $this->resetPage();

        return view('livewire.products.category-products')
            ->with('products', $products);
    }
}
