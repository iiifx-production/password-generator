<?php

namespace iiifx\PasswordGenerator\Method;

interface MethodInterface
{
    /**
     * @return bool
     */
    public static function isAvailable ();

    /**
     * @param int $limit
     *
     * @return int
     */
    public function getRandomInt ( $limit );
}
