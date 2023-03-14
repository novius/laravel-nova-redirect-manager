<?php

namespace Novius\LaravelNovaRedirectManager;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuItem;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Tool;
use Novius\LaravelNovaRedirectManager\Resources\Redirect;

class LaravelNovaRedirectManager extends Tool
{
    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return \Illuminate\View\View
     */
    public function renderNavigation()
    {
        return view('laravel-nova-redirect-manager::navigation');
    }

    public function menu(Request $request): array
    {
        return [
            MenuSection::make(trans('laravel-nova-redirect-manager::redirect.redirects'), [
                MenuItem::resource(Redirect::class),
            ])->icon('switch-horizontal'),
        ];
    }
}
