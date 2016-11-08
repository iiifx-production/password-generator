<?php

use iiifx\PasswordGenerator\Length;
use iiifx\PasswordGenerator\Method\MethodMT;
use iiifx\PasswordGenerator\Method\MethodOpenSSL;
use iiifx\PasswordGenerator\Method\MethodRandomInt;
use iiifx\PasswordGenerator\Options;
use iiifx\PasswordGenerator\Symbols;
use iiifx\PasswordGenerator\Generator;

echo '<pre>';

require __DIR__ . '/../vendor/autoload.php';

$length = new Length( 10, 16 );
$symbols = [
    new Symbols( 'abcdefghijklmnopqrstuvwxyz', 100 ),
    new Symbols( 'ABCDEFGHIJKLMNOPQRSTUVWXYZ', 50 ),
    new Symbols( '1234567890', 50 ),
    new Symbols( '!@#$%?&:*+-.', 30 ),
];
$options = new Options( $length, $symbols );

$generator = new Generator( $options );
echo $generator->generate() . PHP_EOL;
echo $generator->generate() . PHP_EOL;
echo $generator->generate() . PHP_EOL;
echo PHP_EOL;

if ( MethodMT::isAvailable() ) {
    echo MethodMT::class . PHP_EOL;
    $generator = new Generator( $options, new MethodMT() );
    echo $generator->generate() . PHP_EOL;
    echo $generator->generate() . PHP_EOL;
    echo $generator->generate() . PHP_EOL;
    echo PHP_EOL;
}

if ( MethodRandomInt::isAvailable() ) {
    echo MethodRandomInt::class . PHP_EOL;
    $generator = new Generator( $options, new MethodRandomInt() );
    echo $generator->generate() . PHP_EOL;
    echo $generator->generate() . PHP_EOL;
    echo $generator->generate() . PHP_EOL;
    echo PHP_EOL;
}

if ( MethodOpenSSL::isAvailable() ) {
    echo MethodOpenSSL::class . PHP_EOL;
    $generator = new Generator( $options, new MethodOpenSSL() );
    echo $generator->generate() . PHP_EOL;
    echo $generator->generate() . PHP_EOL;
    echo $generator->generate() . PHP_EOL;
    echo PHP_EOL;
}

$generator = new Generator( new Options(
    new Length( 32 ),
    [ new Symbols( '0123456789abcdef' ) ]
) );
echo $generator->generate() . PHP_EOL;
echo $generator->generate() . PHP_EOL;
echo $generator->generate() . PHP_EOL;
echo PHP_EOL;
