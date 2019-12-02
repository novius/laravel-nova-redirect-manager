<?php

namespace Novius\LaravelNovaRedirectManager;

use Laravel\Nova\Tool;

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
}
