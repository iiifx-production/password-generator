<?php

namespace iiifx\Password\Length;

interface LengthInterface
{
    /**
     * @param int      $min
     * @param int|null $max
     */
    public function __construct ( $min = 8, $max = null );

    /**
     * @param int $min
     *
     * @return $this
     */
    public function setMin ( $min );

    /**
     * @param int $max
     *
     * @return $this
     */
    public function setMax ( $max );

    /**
     * @return int
     */
    public function getLength ();
}
