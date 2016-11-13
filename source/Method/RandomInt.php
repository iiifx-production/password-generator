<?php

namespace iiifx\Password\Method;

class RandomInt implements MethodInterface
{
    /**
     * @inheritdoc
     */
    public static function isAvailable ()
    {
        return function_exists( 'random_int' );
    }

    /**
     * @inheritdoc
     */
    public function getRandomInt ( $limit )
    {
        return random_int( 0, $limit );
    }
}
