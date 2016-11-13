<?php

namespace iiifx\Password\Method;

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
