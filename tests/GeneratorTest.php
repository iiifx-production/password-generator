<?php

use iiifx\Password\Generator\Generator;
use iiifx\Password\Length\Length;
use iiifx\Password\Method\MTRand;
use iiifx\Password\Options;
use iiifx\Password\Symbols\Symbols;

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
        new Generator( $options, new MTRand() );
    }

    public function testGenerate ()
    {
        $options = new Options( new Length( 1 ), [
            new Symbols( 'X' ),
        ] );
        $generator = new Generator( $options );
        $this->assertEquals( 'X', $generator->generate() );
        $this->assertEquals( 'X', $generator->generate() );

        $options = new Options( new Length( 10 ), [
            new Symbols( 'XX' ),
        ] );
        $generator = new Generator( $options );
        $this->assertEquals( 'XXXXXXXXXX', $generator->generate() );
        $this->assertEquals( 'XXXXXXXXXX', $generator->generate() );

        $options = new Options( new Length( 100 ), [
            new Symbols( 'XXX' ),
        ] );
        $generator = new Generator( $options );
        $this->assertEquals( 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', $generator->generate() );
        $this->assertEquals( 'XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX', $generator->generate() );
    }
}
