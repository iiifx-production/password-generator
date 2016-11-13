<?php

namespace iiifx\PasswordGenerator;

use iiifx\PasswordGenerator\Method\MethodMT;
use iiifx\PasswordGenerator\Method\MethodInterface;

class Generator implements GeneratorInterface
{
    /**
     * @var Options
     */
    protected $options;

    /**
     * @var MethodInterface
     */
    protected $method;

    /**
     * @param Options         $options
     * @param MethodInterface $method
     */
    public function __construct ( Options $options, MethodInterface $method = null )
    {
        $this->options = $options;
        $this->method = $method;
    }

    /**
     * @return MethodInterface
     */
    public function getMethod ()
    {
        if ( !$this->method instanceof MethodInterface ) {
            $this->method = new MethodMT();
        }
        return $this->method;
    }

    /**
     * @return string
     */
    public function generate ()
    {
        $password = '';
        $map = $this->options->createHitRateMap();
        $limit = count( $map ) - 1;
        $length = $this->options->createLength();
        for ( $i = 0; $i < $length; $i++ ) {
            $position = $this->getMethod()->getRandomInt( $limit );
            $symbols = $map[ $position ];
            $password .= $symbols->getRandomSymbol( $this->getMethod() );
        }
        return $password;
    }
}
