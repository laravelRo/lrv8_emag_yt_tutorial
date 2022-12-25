<?php

namespace App\Providers;

use View;
use App\Models\content\Section;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        $section_prods = Section::select('id', 'slug', 'name')->withCount([
            'products' =>
            function ($query) {
                $query->where('active', true);
            }
        ])
            ->get();

        View::share('sections_prods', $section_prods);
    }
}
