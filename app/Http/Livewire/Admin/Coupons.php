<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use App\Models\shop\Coupon;
use App\Models\content\Brand;
use App\Models\content\Section;
use Illuminate\Support\Facades\DB;

class Coupons extends Component
{

    public $coupon_user_active;
    public $coupon_users;
    public $user_id;
    public $error_message;

    public $coupon_brand_active;
    public $brands_free;
    public $brands_coupon;

    public $coupon_categs_active;
    public $sections;
    public $section_id;
    public $section_categs;
    public $coupon_categs = [];
    public $confirm_categs;


    // ====================
    //atasarea couponul unui utilizator
    // ====================

    public function atachUser()
    {
        $this->validate([
            'user_id' => 'required|numeric'
        ]);

        $user = User::find($this->user_id);
        if (!$user) {
            $this->error_message = "Acest utilizator nu exista in baza de date";
            $this->user_id = null;

            return;
        }


        $this->coupon_user_active->users()->attach($this->user_id);
        $this->coupon_users = $this->coupon_user_active->users()->orderBy('name')->get();

        $this->user_id = null;
    }

    public function detachUser($id)
    {

        $this->coupon_user_active->users()->detach($id);
        $this->coupon_users = $this->coupon_user_active->users()->orderBy('name')->get();
        $this->user_id = null;
    }


    public function openModalCoupons($id)
    {

        $this->coupon_user_active = Coupon::findOrFail($id);
        $this->coupon_users = $this->coupon_user_active->users()->orderBy('name')->get();

        $this->dispatchBrowserEvent('openCouponsModal');
    }

    public function resetUserModal()
    {
        $this->user_id = null;
        $this->error_message = null;
        $this->coupon_active = null;
    }

    // <<< END=================
    //atasarea couponul unui utilizator
    // ====================

    // ===========================

    // =========================
    // ATASAREA BRANDURILOR LA UN COUPON
    // =========================

    public function openModalBrand($id)
    {
        $this->coupon_brand_active = Coupon::findOrFail($id);

        //obtin brandurile care nu sunt atasate de coupon
        $this->getFreeBrands();

        //declansez butonul pentru afisarea ferestrei modale
        $this->dispatchBrowserEvent('openBrandsModal');
    }

    //obtin brandurile care nu sunt atasate de couponul activ
    public function getFreeBrands()
    {
        //obtin toate brandurile active
        $brands = Brand::select('id', 'name')
            ->where('active', true)
            ->orderBy('name')
            ->get();

        //obtin toate bbrandurile atasate couponului in ordine alfabetica
        $this->brands_coupon = $this->coupon_brand_active->brands()
            ->orderBy('name')
            ->get();

        // obtin diferenta intre toate brandurile si brandurile atasate couponului
        $this->brands_free = $brands->diff($this->brands_coupon);
    }

    public function addBrandToCoupon($id)
    {
        $this->coupon_brand_active->brands()->attach($id);
        //obtin brandurile care nu sunt atasate de coupon
        $this->getFreeBrands();
    }

    public function detachBrand($id)
    {
        $this->coupon_brand_active->brands()->detach($id);
        //obtin brandurile care nu sunt atasate de coupon
        $this->getFreeBrands();
    }

    public function resetBrandsModal()
    {
        $this->coupon_brand_active = null;
        $this->brands_free = null;
        $this->brands_coupon = null;
    }

    // <<<<<< END=====================
    // ATASAREA BRANDURILOR LA UN COUPON
    // =========================


    // ====================
    //atasarea couponului categoriilor unei sectiuni
    // ====================

    public function openModalCategs($id)
    {
        $this->coupon_categs_active = Coupon::findOrFail($id);
        //declansez butonul pentru afisarea ferestrei modale
        $this->dispatchBrowserEvent('openCategsModal');

        //intiez sectiunile active ale sitului
        $this->sections = Section::with('categories')->select('id', 'name')
            ->where('active', true)
            ->orderBy('name')
            ->get();

        //verific daca couponul are deja categorii atasate
        if ($this->coupon_categs_active->categories()->count()) {
            $this->section_id = $this->coupon_categs_active->categories()->first()->section->id;

            $this->section_categs = Section::findOrfail($this->section_id)
                ->categories()
                ->select('id', 'name')
                ->orderBy('name')
                ->get();

            $this->coupon_categs = $this->coupon_categs_active->categories
                ->pluck('id')
                ->toArray();
        }
    }

    public function selectSection($id)
    {
        if ($this->coupon_categs_active->categories()->count() > 0) {
            if ($id == $this->coupon_categs_active->categories()->first()->section->id) {
                $this->coupon_categs = $this->coupon_categs_active->categories
                    ->pluck('id')
                    ->toArray();
            }
        } else {
            $this->coupon_categs = [];
        }


        $this->section_id = $id;


        //initializez categoriile sectiunii
        $section = Section::findOrFail($id);
        $this->section_categs = $section->categories()
            ->select('id', 'name')
            ->orderBy('name')
            ->get();
    }

    public function attachCouponCategs()
    {
        $this->coupon_categs_active->categories()->sync($this->coupon_categs);
        $this->confirm_categs = "Categoriile selectate au fost atasate couponului";
    }
    public function resetCategsModal()
    {
        $this->coupon_categs_active = null;
        $this->coupon_categs = null;
        $this->section_categs = null;
        $this->sections = null;
        $this->section_id = null;
        $this->confirm_categs = null;
    }

    public function detachAllCategories()
    {
        $this->coupon_categs_active->categories()->detach();
        $this->coupon_categs = [];
        $this->confirm_categs = "Couponul nu mai are nici o categorie atasata";
    }


    // <<<<< END====================
    //atasarea couponului categoriilor unei sectiuni
    // ====================





    public function render()
    {
        $coupons = Coupon::orderByDesc('expired_at')->paginate()->withQuerystring();
        return view('livewire.admin.coupons')
            ->with('coupons', $coupons);
    }
}
