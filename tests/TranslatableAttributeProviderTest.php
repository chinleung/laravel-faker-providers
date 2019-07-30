<?php

namespace ChinLeung\LaravelFakerProviders\Tests;

use ChinLeung\LaravelFakerProviders\TranslatableAttributeProvider;
use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase;

class TranslatableAttributeProviderTest extends TestCase
{
    use WithFaker;

    /**
     * Two locales for the test.
     *
     * @var array
     */
    protected $twoLocales = ['en', 'fr'];

    /**
     * Setup the tests.
     *
     * @return void
     */
    protected function setUp() : void
    {
        parent::setUp();

        $this->faker->addProvider(
            new TranslatableAttributeProvider($this->faker)
        );
    }

    /**
     * Make sure we can pass a closure for the translatable method.
     *
     * @test
     * @return void
     */
    public function a_closure_can_be_passed_as_translatable() : void
    {
        $closure = function ($locale) {
            return strtolower($this->faker->firstName);
        };

        $values = $this->faker->translatable($closure);
        $this->assertCount(1, $values);
        $this->assertValuesAreLowercased($values);

        $values = $this->faker->translatable($closure, $this->twoLocales);
        $this->assertCount(2, $values);
        $this->assertValuesAreLowercased($values);
        $this->assertEquals($this->twoLocales, array_keys($values));
    }

    /**
     * A name can be generated for each locale.
     *
     * @test
     * @return void
     */
    public function a_name_can_be_generated_for_each_locale() : void
    {
        $this->assertCount(1, $this->faker->translatableName);
        $this->assertCount(2, $names = $this->faker->translatableName($this->twoLocales));
        $this->assertEquals($this->twoLocales, array_keys($names));
    }

    /**
     * Assert that the values are lowercased.
     *
     * @return self
     */
    protected function assertValuesAreLowercased(array $values) : self
    {
        foreach ($values as $value) {
            $this->assertEquals(strtolower($value), $value);
        }

        return $this;
    }
}
