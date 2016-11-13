<?php

namespace iiifx\PasswordGenerator;

use InvalidArgumentException;

class Pattern
{
    /**
     * @var string
     */
    protected $pattern;

    /**
     * @var Generator[]
     */
    protected $generators = [];

    /**
     * @param string               $pattern
     * @param GeneratorInterface[] $generators
     */
    public function __construct ( $pattern, array $generators )
    {
        $this->setPattern( $pattern );
        $this->setGenerators( $generators );
    }

    /**
     * @param string $pattern
     *
     * @return $this
     *
     * @throws InvalidArgumentException
     */
    public function setPattern ( $pattern )
    {
        if ( is_string( $pattern ) && strlen( $pattern ) > 0 ) {
            $this->pattern = $pattern;
            return $this;
        }
        throw new InvalidArgumentException( 'Pattern must be a string, and contain at least one character' );
    }

    /**
     * @return string
     */
    public function getPattern ()
    {
        return $this->pattern;
    }

    /**
     * @param GeneratorInterface[] $generators
     *
     * @return $this
     */
    public function setGenerators ( array $generators )
    {
        foreach ( $generators as $index => $generator ) {
            $this->addGenerator( $index, $generator );
        }
        return $this;
    }

    /**
     * @param string             $name
     * @param GeneratorInterface $generator
     *
     * @return $this
     */
    public function addGenerator ( $name, GeneratorInterface $generator )
    {
        $this->generators[ $name ] = $generator;
        return $this;
    }

    /**
     * @return GeneratorInterface[]
     */
    public function getGenerators ()
    {
        return $this->generators;
    }

    /**
     * @return $this
     */
    public function clearGenerators ()
    {
        $this->generators = [];
        return $this;
    }

    /**
     * @return string
     */
    public function create ()
    {
        $pattern = $this->getPattern();
        foreach ( $this->getGenerators() as $name => $generator ) {
            if ( $count = substr_count( $pattern, $name ) ) {
                if ( strpos( $name, '?' ) === false ) {
                    $pattern = str_replace( $name, $generator->generate(), $pattern );
                } else {
                    $name = '/' . preg_quote( "{$name}", '/' ) . '/';
                    for ( $i = 0; $i < $count; $i++ ) {
                        $pattern = preg_replace( $name, $generator->generate(), $pattern, 1 );
                    }
                }
            }
        }
        return $pattern;
    }
}
