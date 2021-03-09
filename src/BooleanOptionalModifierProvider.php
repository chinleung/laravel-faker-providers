<?php

namespace ChinLeung\LaravelFakerProviders;

use Faker\DefaultGenerator;
use Faker\Provider\Base;

class BooleanOptionalModifierProvider extends Base
{
    /**
     * Chainable method for making any formatter optional.
     *
     * @param  mixed  $weight
     * @param  mixed|null  $default
     * @return mixed|null
     */
    public function optional($weight = 0.5, $default = null)
    {
        if (! is_numeric($weight)) {
            return $weight ? $this->generator : new DefaultGenerator($default);
        }

        return parent::optional($weight, $default);
    }
}
