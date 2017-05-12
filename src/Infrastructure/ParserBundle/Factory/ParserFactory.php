<?php

namespace Infrastructure\ParserBundle\Factory;

use Domain\Parser\Parser;
use Domain\Parser\Factory\ParserFactoryInterface;

/**
 * Class ParserFactory
 * @package Infrastructure\ParserBundle\Factory
 */
class ParserFactory implements ParserFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function create(): Parser
    {
        return new Parser();
    }
}