<?php

namespace App\Facades;

use App\Models\User;
use Illuminate\Support\Facades\Auth as LaravelAuth;

/**
 * Class Auth - Custom facade declaration for static analysis
 *
 * @method static bool check()
 * @method static bool guest()
 * @method static User|null user()
 * @method static int|string|null id()
 * @method static bool validate(array $credentials = [])
 * @method static void setUser(\Illuminate\Contracts\Auth\Authenticatable $user)
 * @method static bool attempt(array $credentials = [], bool $remember = false)
 * @method static bool once(array $credentials = [])
 * @method static void login(\Illuminate\Contracts\Auth\Authenticatable $user, bool $remember = false)
 * @method static \Illuminate\Contracts\Auth\Authenticatable loginUsingId(mixed $id, bool $remember = false)
 * @method static bool onceUsingId(mixed $id)
 * @method static bool viaRemember()
 * @method static void logout()
 * @method static \Symfony\Component\HttpFoundation\Response|null basic(string $field = 'email', array $extraConditions = [])
 * @method static \Symfony\Component\HttpFoundation\Response|null onceBasic(string $field = 'email', array $extraConditions = [])
 * @method static bool attemptWhen(array $credentials = [], array|callable|null $callbacks = null, bool $remember = false)
 * @method static \Illuminate\Auth\AuthManager guard(string|null $name = null)
 * @method static \Illuminate\Contracts\Auth\StatefulGuard|mixed getDefaultDriver()
 * @method static void shouldUse(string $name)
 *
 * @see \Illuminate\Auth\AuthManager
 * @see \Illuminate\Contracts\Auth\Factory
 * @see \Illuminate\Contracts\Auth\Guard
 * @see \Illuminate\Contracts\Auth\StatefulGuard
 */
class Auth extends LaravelAuth
{
    // This class is empty and only exists to provide IDE/static analysis hints via PHPDoc
}
