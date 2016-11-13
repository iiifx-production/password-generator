<?php

namespace iiifx\Password\Method;

class MTRand implements MethodInterface
{
    /**
     * @inheritdoc
     */
    public static function isAvailable ()
    {
        return function_exists( 'mt_rand' );
    }

    /**
     * @inheritdoc
     */
    public function getRandomInt ( $limit )
    {
        return mt_rand( 0, $limit );
    }
}
