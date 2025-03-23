<?php

namespace Novius\LaravelNovaRedirectManager\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Redirect
 *
 * @property string $id
 * @property string $from
 * @property string $to
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|Redirect newModelQuery()
 * @method static Builder|Redirect newQuery()
 * @method static Builder|Redirect query()
 *
 * @mixin Model
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
