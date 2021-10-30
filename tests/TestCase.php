<?php

namespace Tests;

use Exception;
use Faker\Factory as FakerFactory;
use Generator;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

use function PHPUnit\Framework\throwException;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // private Generator $faker;

    // public function setUp():void
    // {
    //     parent::setUp();

    //     $this->faker = FakerFactory::create();
    //     Artisan::call('migrate:refresh');
    // }

    // public function _get($key)
    // {
    //     if($key == 'faker')
    //     {
    //         return $this->faker;
    //     }
    //     throw new Exception('Unknown Key Request');
    // }
}
