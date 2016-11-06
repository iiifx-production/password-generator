<?php

namespace iiifx\PasswordGenerator;

class Options
{
    /**
     * @var Length
     */
    protected $length;

    /**
     * @var Symbols[]
     */
    protected $symbols = [];

    /**
     * @param Length    $length
     * @param Symbols[] $symbols
     */
    public function __construct ( Length $length, array $symbols )
    {
        $this->setLength( $length );
        foreach ( $symbols as $item ) {
            $this->addSymbols( $item );
        }
    }

    /**
     * @param Length $length
     */
    protected function setLength ( Length $length )
    {
        $this->length = $length;
    }

    /**
     * @param Symbols $symbols
     */
    protected function addSymbols ( Symbols $symbols )
    {
        $this->symbols[] = $symbols;
    }

    /**
     * @return Symbols[]
     */
    protected function getSymbolsList ()
    {
        return $this->symbols;
    }

    /**
     * @return Symbols[]
     */
    protected function cloneSymbolsList ()
    {
        $symbolsList = [];
        foreach ( $this->getSymbolsList() as $symbols ) {
            $symbolsList[] = clone $symbols;
        }
        return $symbolsList;
    }

    /**
     * @return Symbols[]
     */
    public function createHitRateMap ()
    {
        $hitRateMap = [];
        $symbolsList = $this->cloneSymbolsList();
        $totalCount = count( $symbolsList );
        foreach ( $this->getSymbolsList() as $symbols ) {
            $hitRate = ( $symbols->getPriority() / $totalCount ) * 100;
            $hitRate = $hitRate > 0 ? $hitRate : 1;
            for ( $counter = 0; $counter <= $hitRate; $counter++ ) {
                $hitRateMap[] = $symbols;
            }
        }
        return $hitRateMap;
    }

    /**
     * @return int
     */
    public function createLength ()
    {
        return $this->length->getLength();
    }
}
