<?php

use iiifx\Password\Method\OpenSSL;

class MethodOpenSSLTest extends PHPUnit_Framework_TestCase
{
    public function isActive ()
    {
        return defined( 'OPENSSL_VERSION_NUMBER' );
    }

    public function testIsAvailable ()
    {
        if ( $this->isActive() ) {
            $this->assertTrue( OpenSSL::isAvailable() );
        } else {
            $this->markTestSkipped( 'OpenSSL required for test.' );
        }
    }

    public function testRandom ()
    {
        if ( $this->isActive() ) {
            $method = new OpenSSL();
            for ( $i = 1; $i < 1001; $i++ ) {
                $int = $method->getRandomInt( $i );
                $this->assertTrue( $int >= 0 && $int <= $i );
            }
        } else {
            $this->markTestSkipped( 'OpenSSL required for test.' );
        }
    }
}
