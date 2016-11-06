<?php

use iiifx\PasswordGenerator\Length;
use iiifx\PasswordGenerator\Options;
use iiifx\PasswordGenerator\Symbols;

class OptionsTest extends PHPUnit_Framework_TestCase
{
    public function testLength ()
    {
        $length = new Length( 1 );
        $symbols = [
            new Symbols( '1', 100 ),
        ];
        $options = new Options( $length, $symbols );
        $this->assertEquals( 1, $options->createLength() );
    }

    public function testHitRateMap ()
    {
        $length = new Length( 1 );
        $symbols = [
            new Symbols( '1', 100 ),
        ];
        $options = new Options( $length, $symbols );
        $result = $options->createHitRateMap();
        $this->assertArrayHasKey( 0, $result );
        $this->assertInstanceOf( Symbols::class, $result[ 0 ] );
    }
}
