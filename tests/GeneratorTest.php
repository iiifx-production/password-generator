<?php

use iiifx\PasswordGenerator\Generator;
use iiifx\PasswordGenerator\Length;
use iiifx\PasswordGenerator\Method\MethodMT;
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
        new Generator( $options, new MethodMT() );
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
