<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\content\Suite;
use Livewire\WithPagination;

class ProductsSuites extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $brands;
    public $sections;

    public $filter = [];

    public $brand_id;
    public $selectedBrand;
    public $selected_brand_id;

    public $section_id;
    public $selectedSection;
    public $selected_section_id;

    public $search_text;
    public $search_text_index;

    public function updatedBrandId($value)
    {
        $this->resetPage();

        if ($this->selected_brand_id) {
            $key = array_search(['brand_id', '=', $this->selected_brand_id], $this->filter);
            if ($key !== false) {
                unset($this->filter[$key]);
            }
        }
        if ($value > 0) {
            $this->filter[] = ['brand_id', '=', $value];

            $this->selectedBrand = $this->brands->firstWhere('id', $value)->name;
            $this->selected_brand_id = $value;
        }
    }

    public function updatedSectionId($value)
    {
        $this->resetPage();

        if ($this->selected_section_id) {
            $key = array_search(['section_id', '=', $this->selected_section_id], $this->filter);
            if ($key !== false) {
                unset($this->filter[$key]);
            }
        }

        if ($value > 0) {
            $this->filter[] = ['section_id', '=', $value];
            $this->selectedSection = $this->sections->firstWhere('id', $value)->name;
            $this->selected_section_id = $value;
        }
    }

    public function updatedSearchText($value)
    {
        $this->resetPage();

        if ($this->search_text_index) {
            $key = array_search(['name', 'LIKE', "%$this->search_text_index%"], $this->filter);
            if ($key !== false) {
                unset($this->filter[$key]);
            }
        }

        if ($value > 0) {
            $this->filter[] = ['name', 'LIKE', "%$value%"];
            $this->search_text_index = $value;
        }
    }
    public function deleteBrand()
    {
        $key = array_search(['brand_id', '=', $this->brand_id], $this->filter);
        if ($key !== false) {
            unset($this->filter[$key]);
        }

        $this->selectedBrand = null;
        $this->brand_id = null;
        $this->selected_brand_id = null;
        $this->resetPage();
    }

    public function deleteSection()
    {
        $key = array_search(['section_id', '=', $this->section_id], $this->filter);
        if ($key !== false) {
            unset($this->filter[$key]);
        }

        $this->selectedSection = null;
        $this->section_id = null;
        $this->selected_section_id = null;
        $this->resetPage();
    }
    public function deleteSearch()
    {

        $key = array_search(['name', 'LIKE', "%$this->search_text%"], $this->filter);
        if ($key !== false) {
            unset($this->filter[$key]);
        }

        $this->search_text = null;
        $this->search_text_index = null;

        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->filter = [];
        $this->search_text = null;
        $this->search_text_index = null;
        $this->brand_id = null;
        $this->selected_brand_id = null;
        $this->selectedBrand = null;

        $this->selectedSection = null;
        $this->selected_section_id = null;
        $this->section_id = null;
    }


    public function render()
    {
        $suites = Suite::withCount(['products'])
            ->with([
                'brand' => function ($query) {
                    $query->select('id', 'name');
                },
                'section' => function ($query) {
                    $query->select('id', 'name');
                }
            ])
            ->where($this->filter)
            ->orderBy('name')
            ->paginate();
        return view('livewire.admin.products-suites')
            ->with('suites', $suites);
    }
}
