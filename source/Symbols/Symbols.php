<?php

namespace iiifx\Password\Symbols;

use iiifx\Password\Method\MethodInterface;
use InvalidArgumentException;

class Symbols implements SymbolsInterface
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
     * @inheritdoc
     */
    public function __construct ( $symbols, $priority = 100 )
    {
        $this->setSymbols( $symbols );
        $this->setPriority( $priority );
    }

    /**
     * @inheritdoc
     *
     * @throws InvalidArgumentException
     */
    public function setSymbols ( $symbols )
    {
        if ( is_string( $symbols ) && strlen( $symbols ) > 0 ) {
            $this->symbols = $symbols;
            return true;
        }
        throw new InvalidArgumentException( 'Symbols must be a string, and contain at least one character' );
    }

    /**
     * @inheritdoc
     *
     * @throws InvalidArgumentException
     */
    public function setPriority ( $priority )
    {
        if ( is_int( $priority ) && $priority > 0 && $priority <= 100 ) {
            $this->priority = $priority;
            return true;
        }
        throw new InvalidArgumentException( 'Priority must be interger and in the range from 1 to 100' );
    }

    /**
     * @inheritdoc
     */
    public function getPriority ()
    {
        return $this->priority;
    }

    /**
     * @inheritdoc
     */
    public function getRandomSymbol ( MethodInterface $method = null )
    {
        $length = strlen( $this->symbols );
        if ( $method ) {
            $position = $method->getRandomInt( $length - 1 );
        } else {
            $position = mt_rand( 0, $length - 1 );
        }
        return $this->symbols[ $position ];
    }
}
