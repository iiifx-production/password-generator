<?php

namespace iiifx\Password\Generator;

use iiifx\Password\Method\MethodInterface;
use iiifx\Password\Options;

interface GeneratorInterface
{
    /**
     * @param Options         $options
     * @param MethodInterface $method
     */
    public function __construct ( Options $options, MethodInterface $method = null );

    /**
     * @return MethodInterface
     */
    public function getMethod ();

    /**
     * @return string
     */
    public function generate ();
}
