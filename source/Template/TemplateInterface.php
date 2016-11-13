<?php

namespace iiifx\Password\Template;

use iiifx\Password\Generator\GeneratorInterface;

interface TemplateInterface
{
    /**
     * @param string               $pattern
     * @param GeneratorInterface[] $generators
     */
    public function __construct ( $pattern, array $generators );

    /**
     * @param string $pattern
     *
     * @return $this
     */
    public function setPattern ( $pattern );

    /**
     * @return string
     */
    public function getPattern ();

    /**
     * @param GeneratorInterface[] $generators
     *
     * @return $this
     */
    public function setGenerators ( array $generators );

    /**
     * @param string             $name
     * @param GeneratorInterface $generator
     *
     * @return $this
     */
    public function addGenerator ( $name, GeneratorInterface $generator );

    /**
     * @return GeneratorInterface[]
     */
    public function getGenerators ();

    /**
     * @return $this
     */
    public function clearGenerators ();

    /**
     * @return string
     */
    public function create ();
}
