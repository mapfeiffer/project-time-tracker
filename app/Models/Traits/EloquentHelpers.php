<?php

namespace App\Models\Traits;

/**
 * A trait to provide method hints for static analysis tools
 *
 * @method static static find(int $id)
 * @method static static findOrFail(int $id)
 * @method static static findOrNew(int $id)
 * @method static static firstOrCreate(array $attributes, array $values = [])
 * @method static static firstOrNew(array $attributes, array $values = [])
 * @method static static updateOrCreate(array $attributes, array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder query()
 * @method static \Illuminate\Pagination\LengthAwarePaginator paginate(int $perPage = null, array $columns = ['*'], string $pageName = 'page', int $page = null)
 * @method static \Illuminate\Database\Eloquent\Builder where($column, $operator = null, $value = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder whereIn($column, $values, $boolean = 'and', $not = false)
 * @method static \Illuminate\Database\Eloquent\Builder whereNotIn($column, $values, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder whereNull($column, $boolean = 'and', $not = false)
 * @method static \Illuminate\Database\Eloquent\Builder whereNotNull($column, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder whereBetween($column, array $values, $boolean = 'and', $not = false)
 * @method static \Illuminate\Database\Eloquent\Builder whereNotBetween($column, array $values, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder orderBy($column, $direction = 'asc')
 * @method static int count($columns = '*')
 * @method static bool exists()
 * @method static \Illuminate\Database\Eloquent\Collection get($columns = ['*'])
 * @method static mixed value($column)
 * @method static static create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Collection|static[] all($columns = ['*'])
 * @method static static first($columns = ['*'])
 * @method static static firstOrFail($columns = ['*'])
 * @method static static firstWhere($column, $operator = null, $value = null, $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder with($relations, $callback = null)
 * @method static \Illuminate\Database\Eloquent\Builder without($relations)
 * @method static \Illuminate\Database\Eloquent\Builder withCount($relations)
 * @method static \Illuminate\Database\Eloquent\Builder has($relation, $operator = '>=', $count = 1, $boolean = 'and', \Closure $callback = null)
 * @method static \Illuminate\Database\Eloquent\Builder doesntHave($relation, $boolean = 'and', \Closure $callback = null)
 *
 * // Spatie Permission methods
 * @method bool hasRole($roles, $guard = null)
 * @method bool hasAnyRole($roles, $guard = null)
 * @method bool hasAllRoles($roles, $guard = null)
 * @method bool hasExactRoles($roles, $guard = null)
 * @method bool hasPermissionTo($permission, $guard = null)
 * @method bool hasAnyPermission($permissions, $guard = null)
 * @method bool hasAllPermissions($permissions, $guard = null)
 * @method \Illuminate\Database\Eloquent\Relations\MorphToMany roles($guard = null)
 * @method \Illuminate\Database\Eloquent\Relations\MorphToMany permissions($guard = null)
 * @method \Illuminate\Support\Collection getAllPermissions($guard = null)
 * @method \Illuminate\Support\Collection getPermissionsViaRoles($guard = null)
 * @method \Illuminate\Support\Collection getDirectPermissions($guard = null)
 * @method \Spatie\Permission\Contracts\Role assignRole($role)
 * @method \Spatie\Permission\Contracts\Role givePermissionTo($permission)
 * @method bool revokePermissionTo($permission)
 * @method bool syncPermissions(...$permissions)
 * @method bool syncRoles(...$roles)
 */
trait EloquentHelpers
{
    // This trait is empty and only exists to provide IDE/static analysis hints via PHPDoc
}
