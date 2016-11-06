<?php

use iiifx\PasswordGenerator\Generator;
use iiifx\PasswordGenerator\Length;
use iiifx\PasswordGenerator\Options;
use iiifx\PasswordGenerator\Symbols;

class GeneratorTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorParams ()
    {
        $length = new Length( 1 );
        $symbols = [
            new Symbols( '1', 100 ),
        ];
        $options = new Options( $length, $symbols );
        new Generator( $options );
    }

    public function testGenerate ()
    {
        $length = new Length( 1 );
        $symbols = [ new Symbols( '1', 100 ) ];
        $options = new Options( $length, $symbols );
        $generator = new Generator( $options );
        $this->assertEquals( '1', $generator->generate() );
        $this->assertEquals( '1', $generator->generate() );
        $length = new Length( 10 );
        $symbols = [ new Symbols( 'z', 100 ) ];
        $options = new Options( $length, $symbols );
        $generator = new Generator( $options );
        $this->assertEquals( 'zzzzzzzzzz', $generator->generate() );
        $this->assertEquals( 'zzzzzzzzzz', $generator->generate() );
    }
}
