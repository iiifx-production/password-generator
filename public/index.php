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

$length = new Length( 8 ); # 8 знаков
$symbols = [
    new Symbols( 'abcdefghijklmnopqrstuvwxyz', 100 ), # Приоритет 100
    new Symbols( '1234567890', 50 ), # Приоритет 50
];
$options = new Options( $length, $symbols );

if ( MethodMT::isAvailable() ) {
    echo MethodMT::class . PHP_EOL;
    $generator = new Generator( $options, new MethodMT() );
    echo $generator->generate() . PHP_EOL; # a844aotw
    echo $generator->generate() . PHP_EOL; # hmxqbug4
    echo $generator->generate() . PHP_EOL; # v94v1c43
    echo PHP_EOL;
}

if ( MethodRandomInt::isAvailable() ) {
    echo MethodRandomInt::class . PHP_EOL;
    $generator = new Generator( $options, new MethodRandomInt() );
    echo $generator->generate() . PHP_EOL; # a844aotw
    echo $generator->generate() . PHP_EOL; # hmxqbug4
    echo $generator->generate() . PHP_EOL; # v94v1c43
    echo PHP_EOL;
}

if ( MethodOpenSSL::isAvailable() ) {
    echo MethodOpenSSL::class . PHP_EOL;
    $generator = new Generator( $options, new MethodOpenSSL() );
    echo $generator->generate() . PHP_EOL; # a844aotw
    echo $generator->generate() . PHP_EOL; # hmxqbug4
    echo $generator->generate() . PHP_EOL; # v94v1c43
    echo PHP_EOL;
}
