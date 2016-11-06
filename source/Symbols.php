<?php

namespace iiifx\PasswordGenerator;

use InvalidArgumentException;

class Symbols
{
    /**
     * @var string
     */
    protected $symbols;

    /**
     * @var int
     */
    protected $priority;

    /**
     * @param string $symbols
     * @param int    $priority
     */
    public function __construct ( $symbols, $priority = 100 )
    {
        $this->setSymbols( $symbols );
        $this->setPriority( $priority );
    }

    /**
     * @param $symbols
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    protected function setSymbols ( $symbols )
    {
        if ( is_string( $symbols ) && strlen( $symbols ) > 0 ) {
            $this->symbols = $symbols;
            return true;
        }
        throw new InvalidArgumentException( 'Symbols must be a string, and contain at least one character' );
    }

    /**
     * @param int $priority
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    protected function setPriority ( $priority )
    {
        if ( is_int( $priority ) && $priority > 0 && $priority <= 100 ) {
            $this->priority = $priority;
            return true;
        }
        throw new InvalidArgumentException( 'Priority must be interger and in the range from 1 to 100' );
    }

    /**
     * @return int
     */
    public function getPriority ()
    {
        return $this->priority;
    }

    /**
     * @return string
     */
    public function getRandomSymbol ()
    {
        $length = strlen( $this->symbols );
        $position = mt_rand( 0, $length - 1 );
        return $this->symbols[ $position ];
    }
}
