<?php

use iiifx\Password\Method\MTRand;

class MethodMTTest extends PHPUnit_Framework_TestCase
{
    public function testIsAvailable ()
    {
        $this->assertTrue( MTRand::isAvailable() );
    }

    public function testRandom ()
    {
        $method = new MTRand();
        for ( $i = 1; $i < 1001; $i++ ) {
            $int = $method->getRandomInt( $i );
            $this->assertTrue( $int >= 0 && $int <= $i );
        }
    }
}
