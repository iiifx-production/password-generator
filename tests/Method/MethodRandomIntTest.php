<?php

use iiifx\PasswordGenerator\Method\MethodRandomInt;

class MethodRandomIntTest extends PHPUnit_Framework_TestCase
{
    public function isActive ()
    {
        return PHP_MAJOR_VERSION >= 7;
    }

    public function testIsAvailable ()
    {
        if ( $this->isActive() ) {
            $this->assertTrue( MethodRandomInt::isAvailable() );
        } else {
            $this->markTestSkipped( 'PHP7 required for test.' );
        }
    }

    public function testRandom ()
    {
        if ( $this->isActive() ) {
            $method = new MethodRandomInt();
            for ( $i = 1; $i < 1001; $i++ ) {
                $int = $method->getRandomInt( $i );
                $this->assertTrue( $int >= 0 && $int <= $i );
            }
        } else {
            $this->markTestSkipped( 'PHP7 required for test.' );
        }
    }
}
