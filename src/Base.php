<?php

namespace ChinLeung\LaravelFakerProviders;

use Faker\Generator;

abstract class Base
{
    /**
     * The Faker generator instance.
     *
     * @var \Faker\Generator
     */
    protected $generator;

    /**
     * Create a new instance of the provider.
     *
     * @param  \Faker\Generator  $generator
     */
    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
    }
}
