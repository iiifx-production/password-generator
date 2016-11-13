<?php

use iiifx\Password\Length\Length;

class LengthTest extends PHPUnit_Framework_TestCase
{
    public function testConstructorParam1 ()
    {
        $this->setExpectedException( 'InvalidArgumentException' );
        new Length( null );
    }

    public function testConstructorParam2 ()
    {
        $this->setExpectedException( 'InvalidArgumentException' );
        new Length( 1, -1 );
    }

    public function testLength1 ()
    {
        $length = new Length( 2, 1 );
        $this->setExpectedException( 'InvalidArgumentException' );
        $length->getLength();
    }

    public function testLength2 ()
    {
        $length = new Length( 1 );
        $this->assertEquals( 1, $length->getLength() );
        $length = new Length( 2, 2 );
        $this->assertEquals( 2, $length->getLength() );
    }

    public function testLength3 ()
    {
        $length = new Length( 2, 3 );
        $this->assertGreaterThan( 1, $length->getLength() );
        $this->assertLessThan( 4, $length->getLength() );
    }
}
