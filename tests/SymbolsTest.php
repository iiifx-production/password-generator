<?php

use iiifx\PasswordGenerator\Symbols;

class SymbolsTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorParam1 ()
    {
        $this->setExpectedException( 'InvalidArgumentException' );
        new Symbols( null );
    }

    public function testConstructorParam2 ()
    {
        $this->setExpectedException( 'InvalidArgumentException' );
        new Symbols( '1', -1 );
    }

    public function testSymbols ()
    {
        $symbols = new Symbols( '1', 100 );
        $this->assertEquals( '1', $symbols->getRandomSymbol() );
    }

    public function testPriority ()
    {
        $symbols = new Symbols( '1', 100 );
        $this->assertEquals( 100, $symbols->getPriority() );
    }
}
