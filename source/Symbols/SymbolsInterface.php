<?php

namespace iiifx\Password\Symbols;

use iiifx\Password\Method\MethodInterface;

interface SymbolsInterface
{
    /**
     * @param string $symbols
     * @param int    $priority
     */
    public function __construct ( $symbols, $priority = 100 );

    /**
     * @param string $symbols
     *
     * @return $this
     */
    public function setSymbols ( $symbols );

    /**
     * @param int $priority
     *
     * @return $this
     */
    public function setPriority ( $priority );

    /**
     * @return int
     */
    public function getPriority ();

    /**
     * @param MethodInterface $method
     *
     * @return string
     */
    public function getRandomSymbol ( MethodInterface $method = null );
}
