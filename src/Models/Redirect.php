<?php

namespace Novius\LaravelNovaRedirectManager\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Redirect
 * @package Novius\LaravelNovaRedirectManager\Models
 *
 * @property string from
 * @property string to
 */
class Redirect extends Model
{
    protected $table = 'redirects';

    protected $primaryKey = 'id';

    protected $fillable = [
        'from',
        'to',
    ];
}
