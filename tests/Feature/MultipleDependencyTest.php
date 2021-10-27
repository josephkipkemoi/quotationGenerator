<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MultipleDependencyTest extends TestCase
{
  
    public function testProducerFirst()
    {
        $this->assertTrue(true);

        return 'first';
    }

    public function testProducerSecond()
    {
        $this->assertTrue(true);

        return 'second';
    }

    /*
    * @depends testProducerFirst
    * @depends testProducerSecond
    */
    public function testConsumer(string $a = 'first', string $b = 'second')
    {
        $this->assertSame('first',$a);
        $this->assertSame('second',$b);
    }
}
