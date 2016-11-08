<?php

use iiifx\PasswordGenerator\Method\MethodMT;

class MethodMTTest extends PHPUnit_Framework_TestCase
{
    public function testIsAvailable ()
    {
        $this->assertTrue( MethodMT::isAvailable() );
    }

    public function testRandom ()
    {
        $method = new MethodMT();
        for ( $i = 1; $i < 1001; $i++ ) {
            $int = $method->getRandomInt( $i );
            $this->assertTrue( $int >= 0 && $int <= $i );
        }
    }
}
