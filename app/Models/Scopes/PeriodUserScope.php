<?php

namespace App\Models\Scopes;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

/**
 * Class to filter periods by user unless the user has super_admin role
 *
 * The following PHPDoc annotations are for static analysis tools like PHPActor
 * that might not recognize Laravel's dynamic methods from facades and traits.
 *
 * @method static bool check()
 * @method static User|null user()
 * @method static int|string|null id()
 */
class PeriodUserScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * Note: The hasRole method comes from Spatie\Permission\Traits\HasRoles
     * which is used in the User model. Static analysis tools might not
     * recognize this method, but it exists at runtime.
     */
    public function apply(Builder $builder, Model $model): void
    {
        if (
            config('app.env') !== 'testing'
            && Auth::check()
            && ! Auth::user()->hasRole('super_admin')
        ) {
            $builder->where('user_id', '=', Auth::id());
        }
    }
}
