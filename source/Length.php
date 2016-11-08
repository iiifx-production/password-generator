<?php

namespace iiifx\PasswordGenerator;

use InvalidArgumentException;

class Length
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
     * @param int      $min
     * @param int|null $max
     */
    public function __construct ( $min = 8, $max = null )
    {
        $this->setMin( $min );
        $this->setMax( $max === null ? $min : $max );
    }

    /**
     * @param int $min
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    protected function setMin ( $min )
    {
        if ( $min > 0 && $min <= 100 ) {
            $this->min = (int) $min;
            return true;
        }
        throw new InvalidArgumentException( 'The min length should be from 1 to 100' );
    }

    /**
     * @param int $max
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    protected function setMax ( $max )
    {
        if ( $max > 0 && $max <= 100 ) {
            $this->max = (int) $max;
            return true;
        }
        throw new InvalidArgumentException( 'The max length should be from 1 to 100' );
    }

    /**
     * @return int
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
