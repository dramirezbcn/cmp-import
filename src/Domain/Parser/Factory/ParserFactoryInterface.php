<?php

namespace Domain\Parser\Factory;

use Domain\Parser\Parser;

/**
 * Interface ParserFactoryInterface
 * @package Domain\Parser\Factory
 */
interface ParserFactoryInterface
{
    /**
     * @return Parser
     */
    public function create(): Parser;
}
