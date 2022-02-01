<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\content\Brand;
use App\Models\content\Product;
use App\Models\content\Section;
use App\Models\content\Category;

class AdminProducts extends Component
{
    use Withpagination;
    protected $paginationTheme = 'bootstrap';

    public $currentProduct;
    public $categs = [];

    public $sections;
    public $selected_section = null;
    public $selected_categories = null;
    public $selected_categoryid = null;

    public $brands;
    public $selected_brandid = null;


    private $products = null;

    public $filter = [];
    public $section_title;
    public $category_title;

    public $search_product = null;



    public function mount()
    {
        $this->brands = Brand::all('name', 'id')->sortBy('name');
    }

    public function setCategories()
    {

        $this->currentProduct->categories()->sync($this->categs);
        $this->categs = [];
        $this->dispatchBrowserEvent('closeCategoriesModal', ['name' => $this->currentProduct->name]);
        $this->currentProduct = null;
    }



    public function openModalCategs($id)
    {

        $this->categs = [];
        $this->currentProduct = Product::findOrfail($id);

        //pupulam matricea cu id-urile categoriilor
        foreach ($this->currentProduct->categories as $category) {
            $this->categs[] = $category->id;
        }
        $this->dispatchBrowserEvent('openCategsModal');
    }

    public function selectSection($id)
    {
        $this->resetPage();
        $this->filter = [];

        //verific daca exista brand selectat si mentin filtrul de brand
        if ($this->selected_brandid) {
            $this->filter[] = ['brand_id', '=', $this->selected_brandid];
        }



        if ($this->selected_section == $id) {

            $this->products = null;
            $this->selected_section = null;
            $this->section_title = null;

            $this->selected_categories = null;
            $this->selected_categoryid = null;
            $this->category_title = null;
        } else {
            $this->selected_section = $id;
            $section = Section::findOrFail($id);

            $this->selected_categories = $section->categories->sortBy('name');

            //setez filtrul de sectiune
            $this->filter[] = ['section_id', '=', $id];

            $this->section_title = $section->name;
        }
    }

    public function selectCategory($id)
    {
        $this->resetPage();

        if ($this->selected_categoryid == $id) {

            $this->selected_categoryid = null;
            $this->category_title = null;

            if ($this->selected_brandid) {
                $this->filter = [];
                $this->filter[] = ['brand_id', '=', $this->selected_brandid];
            }
        } else {
            $this->selected_categoryid = $id;
            if ($this->selected_brandid) {
                $this->filter = [];
                $this->filter[] = ['brand_id', '=', $this->selected_brandid];
            }
        }
    }

    public function selectBrand($id)
    {
        $this->resetPage();

        $this->filter = [];
        if ($this->selected_section) {
            $this->filter[] = ['section_id', '=', $this->selected_section];
        }

        if ($this->selected_brandid == $id) {
            $this->selected_brandid = null;
        } else {
            $this->selected_brandid = $id;
            $this->filter[] = ['brand_id', '=', $id];
        }
    }



    public function refreshProducts()
    {
        $this->filter = [];
        $this->selected_brandid = null;
        $this->selected_section = null;
        $this->selected_categoryid = null;
        $this->selected_categories = null;
        $this->search_product = null;
        $this->section_title = null;
        $this->category_title = null;
    }

    //resetam pagina atunci cand cautam un produs
    public function updatedSearchProduct($value)
    {
        $this->resetPage();
    }

    public function render()
    {

        //daca avem o categorie selectata
        if ($this->selected_categoryid) {

            $category = Category::findOrFail($this->selected_categoryid);

            //setam numele sectiunii si categoriei selectate
            $this->category_title = $category->name;
            $this->section_title = $category->section->name;

            //afisam lista cu categorii
            $this->selected_categories = $category->section->categories->sortBy('name');

            //verific daca avem cautare de produs
            if (Str::length($this->search_product > 2)) {
                $this->filter[] = ['name', 'LIKE', "%$this->search_product%"];
            }
            $this->selected_section = $category->section->id;
            $this->products = $category->products()
                ->with(['section', 'categories', 'brand'])
                ->where($this->filter)
                ->orderBy('name')->paginate();
        }
        //daca nu avem categorie selectata
        else {
            //verific daca avem cautare de produs
            if (Str::length($this->search_product > 2)) {
                $this->filter[] = ['name', 'LIKE', "%$this->search_product%"];
            }
            $this->products = Product::query()
                ->with(['section', 'categories', 'brand'])
                ->where($this->filter)
                ->orderBy('name')->paginate();
            $this->sections = Section::all()->sortBy('name');
        }

        return view('livewire.admin.admin-products', [
            'products' => $this->products,
            'sections' => $this->sections,

        ]);
    }
}
