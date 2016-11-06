<?php

namespace iiifx\PasswordGenerator;

use InvalidArgumentException;

class Length
{
    /**
     * @var int
     */
    protected $minimum;

    /**
     * @var int
     */
    protected $maximum;

    /**
     * @param int      $minimum
     * @param int|null $maximum
     */
    public function __construct ( $minimum = 8, $maximum = null )
    {
        $this->setMinimum( $minimum );
        $this->setMaximum( $maximum === null ? $minimum : $maximum );
    }

    /**
     * @param int $minimum
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    protected function setMinimum ( $minimum )
    {
        if ( $minimum > 0 && $minimum <= 100 ) {
            $this->minimum = (int) $minimum;
            return true;
        }
        throw new InvalidArgumentException( 'The minimum length should be from 1 to 100' );
    }

    /**
     * @param int $maximum
     *
     * @return bool
     *
     * @throws InvalidArgumentException
     */
    protected function setMaximum ( $maximum )
    {
        if ( $maximum > 0 && $maximum <= 100 ) {
            $this->maximum = (int) $maximum;
            return true;
        }
        throw new InvalidArgumentException( 'The maximum length should be from 1 to 100' );
    }

    /**
     * @return int
     *
     * @throws InvalidArgumentException
     */
    public function getLength ()
    {
        if ( $this->minimum <= $this->maximum ) {
            return mt_rand( $this->minimum, $this->maximum );
        }
        throw new InvalidArgumentException( 'The minimum length should be less than the maximum' );
    }
}
