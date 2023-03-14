<?php

namespace Novius\LaravelNovaRedirectManager;

use Illuminate\Http\Request;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Tool;
use Novius\LaravelNovaRedirectManager\Resources\Redirect;

class LaravelNovaRedirectManager extends Tool
{
    public function menu(Request $request)
    {
        return MenuSection::resource(Redirect::class)
            ->icon('switch-horizontal');
    }
}
