<?php

namespace iiifx\Password\Template;

use iiifx\Password\Generator\Generator;
use iiifx\Password\Generator\GeneratorInterface;
use InvalidArgumentException;

class Template implements TemplateInterface
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
     * @inheritdoc
     */
    public function __construct ( $pattern, array $generators )
    {
        $this->setPattern( $pattern );
        $this->setGenerators( $generators );
    }

    /**
     * @inheritdoc
     *
     * @throws InvalidArgumentException
     */
    public function setPattern ( $pattern )
    {
        if ( is_string( $pattern ) && strlen( $pattern ) > 0 ) {
            $this->pattern = $pattern;
            return $this;
        }
        throw new InvalidArgumentException( 'Template must be a string, and contain at least one character' );
    }

    /**
     * @inheritdoc
     */
    public function getPattern ()
    {
        return $this->pattern;
    }

    /**
     * @inheritdoc
     */
    public function setGenerators ( array $generators )
    {
        foreach ( $generators as $index => $generator ) {
            $this->addGenerator( $index, $generator );
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function addGenerator ( $name, GeneratorInterface $generator )
    {
        $this->generators[ $name ] = $generator;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function getGenerators ()
    {
        return $this->generators;
    }

    /**
     * @inheritdoc
     */
    public function clearGenerators ()
    {
        $this->generators = [];
        return $this;
    }

    /**
     * @inheritdoc
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
