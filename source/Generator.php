<?php

namespace iiifx\PasswordGenerator;

class Generator
{
    /**
     * @var Options
     */
    protected $options;

    /**
     * @param Options $options
     */
    public function __construct ( Options $options )
    {
        $this->options = $options;
    }

    /**
     * @return string
     */
    public function generate ()
    {
        $password = '';
        $hitRates = $this->options->createHitRateMap();
        $arrayLimit = count( $hitRates ) - 1;
        $length = $this->options->createLength();
        for ( $counter = 0; $counter < $length; $counter++ ) {
            $position = mt_rand( 0, $arrayLimit );
            shuffle( $hitRates );
            $symbols = $hitRates[ $position ];
            $password .= $symbols->getRandomSymbol();
        }
        return $password;
    }
}
