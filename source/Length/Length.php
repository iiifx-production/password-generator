<?php

namespace iiifx\Password\Length;

use InvalidArgumentException;

class Length implements LengthInterface
{
    /**
     * @var int
     */
    protected $min;

    /**
     * @var int
     */
    protected $max;

    /**
     * @inheritdoc
     */
    public function __construct ( $min = 8, $max = null )
    {
        $this->setMin( $min );
        $this->setMax( $max === null ? $min : $max );
    }

    /**
     * @inheritdoc
     *
     * @throws InvalidArgumentException
     */
    public function setMin ( $min )
    {
        if ( $min > 0 && $min <= 100 ) {
            $this->min = (int) $min;
            return $this;
        }
        throw new InvalidArgumentException( 'The min length should be from 1 to 100' );
    }

    /**
     * @inheritdoc
     *
     * @throws InvalidArgumentException
     */
    public function setMax ( $max )
    {
        if ( $max > 0 && $max <= 100 ) {
            $this->max = (int) $max;
            return $this;
        }
        throw new InvalidArgumentException( 'The max length should be from 1 to 100' );
    }

    /**
     * @inheritdoc
     *
     * @throws InvalidArgumentException
     */
    public function getLength ()
    {
        if ( $this->min <= $this->max ) {
            return mt_rand( $this->min, $this->max );
        }
        throw new InvalidArgumentException( 'The min length should be less than the max' );
    }
}
