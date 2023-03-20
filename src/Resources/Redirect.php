<?php

namespace Novius\LaravelNovaRedirectManager\Resources;

use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Novius\LaravelNovaRedirectManager\Rules\UrlAbsoluteOrRelative;
use Novius\LaravelNovaRedirectManager\Rules\UrlRelative;

class Redirect extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \Novius\LaravelNovaRedirectManager\Models\Redirect::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'from';

    /**
     * Indicates if the resource should be displayed in the sidebar.
     *
     * @var bool
     */
    public static $displayInNavigation = true;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'from',
        'to',
    ];

    public static $globallySearchable = false;

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function singularLabel()
    {
        return trans('laravel-nova-redirect-manager::redirect.redirect');
    }

    /**
     * Get the displayable label of the resource.
     *
     * @return string
     */
    public static function label()
    {
        return trans('laravel-nova-redirect-manager::redirect.redirects');
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            Text::make(trans('laravel-nova-redirect-manager::redirect.from'), 'from')
                ->help(trans('laravel-nova-redirect-manager::redirect.relative_url_help'))
                ->rules('required', 'string', 'max:'.$this->maxLengthUrl(), new UrlRelative()),

            Text::make(trans('laravel-nova-redirect-manager::redirect.to'), 'to')
                ->help(trans('laravel-nova-redirect-manager::redirect.url_help'))
                ->rules('required', 'string', 'max:'.$this->maxLengthUrl(), new UrlAbsoluteOrRelative(), 'different:from'),
        ];
    }

    /**
     * Get configured max length value
     *
     * @return int
     */
    protected function maxLengthUrl(): int
    {
        return (int) config('missing-page-redirector.redirect_url_max_length', 1000);
    }
}
