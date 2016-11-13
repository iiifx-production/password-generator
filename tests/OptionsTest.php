<?php

use iiifx\Password\Length\Length;
use iiifx\Password\Options;
use iiifx\Password\Symbols\Symbols;

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
