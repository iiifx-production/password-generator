<?php

namespace iiifx\Password\Method;

class OpenSSL implements MethodInterface
{
    /**
     * @inheritdoc
     */
    public static function isAvailable ()
    {
        return function_exists( 'openssl_random_pseudo_bytes' );
    }

    /**
     * @inheritdoc
     */
    public function getRandomInt ( $limit )
    {
        return hexdec( bin2hex( openssl_random_pseudo_bytes( 3 ) ) ) % ( $limit + 1 );
    }
}
