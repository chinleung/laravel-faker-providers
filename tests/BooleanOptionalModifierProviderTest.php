<?php

namespace ChinLeung\LaravelFakerProviders\Tests;

use ChinLeung\LaravelFakerProviders\BooleanOptionalModifierProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase;

class BooleanOptionalModifierProviderTest extends TestCase
{
    use WithFaker;

    /**
     * Setup the tests.
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->faker->addProvider(
            new BooleanOptionalModifierProvider($this->faker)
        );
    }

    /**
     * Passing a true value will return the generator.
     *
     * @test
     *
     * @return void
     */
    public function passing_a_true_value_will_return_the_generator(): void
    {
        $this->assertNotNull($this->faker->optional(true)->word);
    }

    /**
     * Passing a false value will return the generator.
     *
     * @test
     *
     * @return void
     */
    public function passing_a_false_value_will_return_the_generator(): void
    {
        $this->assertNull($this->faker->optional(false)->word);
    }
}
