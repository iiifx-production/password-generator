<?php

namespace iiifx\Password\Generator;

use iiifx\Password\Method\MTRand;
use iiifx\Password\Method\MethodInterface;
use iiifx\Password\Options;

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
            $this->method = new MTRand();
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
