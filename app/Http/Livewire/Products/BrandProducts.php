<?php

namespace App\Http\Livewire\Products;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\content\Product;
use Illuminate\Support\Facades\DB;

class BrandProducts extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $brand;

    public $minPrice = 0;
    public $maxPrice = 0;


    public $maxPriceSelected;
    public $minPriceSelected;

    public $sections;

    public $filteredSection;

    public $orderItem = "name";
    public $searchItem = "";


    public function mount($brand)
    {
        $this->brand = $brand;

        //intializam double range slider pentur preturi
        $this->minPrice = $brand->products()->where('active', true)->min('price');
        $this->maxPrice = $brand->products()->where('active', true)->max('price');

        $this->maxPriceSelected = $brand->products()->where('active', true)->max('price');
        $this->minPriceSelected = $brand->products()->where('active', true)->min('price');
    }

    public function restoreSearch()
    {
        $this->resetPage();
        $this->searchItem = "";
    }

    public function setSection($id)
    {
        if ($this->filteredSection == $id) {
            $this->filteredSection = null;
        } else {

            $this->filteredSection = $id;
        }
    }

    public function resetFilters()
    {
        $this->searchItem = "";
        $this->filteredSection = null;

        //resetam intervalul de preturi;
        $this->maxPriceSelected = $this->brand->products()->where('active', true)->max('price');
        $this->minPriceSelected = $this->brand->products()->where('active', true)->min('price');



        $percent1 = ($this->minPriceSelected / $this->maxPriceSelected) * 100;
        $this->dispatchBrowserEvent('resetRangePrice', ['percent1' => $percent1, 'percent2' => 100]);


        $this->resetPage();
    }

    public function render()
    {
        $this->sections = Product::select('section_id', DB::raw('COUNT(products.id) AS number_products'))
            ->with('section', function ($qry) {
                $qry->select('id', 'name', 'photo');
            })
            ->where('brand_id', $this->brand->id)
            ->where('active', true)
            ->groupBy('section_id')
            ->orderByDesc('number_products')
            ->get();

        $products = Product::query();
        $products = $products->where('brand_id', $this->brand->id)
            ->where('active', true)
            ->whereBetween('price', [$this->minPriceSelected, $this->maxPriceSelected]);


        //cautarea dupa numele produsului
        if (strlen($this->searchItem) > 3) {
            $products = $products->where('name', 'LIKE', "%$this->searchItem%");
        }

        //filtrarea dupa sectiuni
        if ($this->filteredSection) {

            $products = $products->where('section_id', $this->filteredSection);
        }

        //sortarea produselor dupa diverse criterii
        $products = $products->orderBy(
            str_replace('_desc', '', $this->orderItem),
            str_contains($this->orderItem, '_desc') ? 'DESC' : 'ASC'
        );

        $products = $products->paginate(12);

        $this->resetPage();

        return view('livewire.products.brand-products')
            ->with('products', $products);
    }
}
