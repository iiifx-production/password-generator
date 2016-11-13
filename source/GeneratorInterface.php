<?php

namespace iiifx\PasswordGenerator;

use iiifx\PasswordGenerator\Method\MethodInterface;

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
