<?php

namespace ChinLeung\LaravelFakerProviders;

use Closure;
use Faker\Provider\Base;

class TranslatableAttributeProvider extends Base
{
    /**
     * Execute a closure for every locale of the application.
     *
     * @param  \Closure  $callable
     * @param  array  $locales
     * @return array
     */
    public function translatable(Closure $callable, array $locales = null): array
    {
        if (! $locales) {
            $locales = function_exists('locales')
                ? locales()
                : config('app.locales', [config('app.locale')]);
        }

        return call_user_func_array(
            'array_merge',
            array_map(static function ($locale) use ($callable) {
                return [
                    $locale => call_user_func($callable, $locale),
                ];
            }, $locales)
        );
    }

    /**
     * Generate a name for every locale of the application.
     *
     * @param  array  $locales
     * @return array
     */
    public function translatableName(array $locales = null): array
    {
        return $this->translatable(function () {
            return $this->generator->name();
        }, $locales);
    }
}
