<?php

namespace Domain\Parser;

use Domain\Video\Model\Video;

/**
 * Interface ParserInterface
 * @package Domain\Parser
 */
interface ParserInterface
{
    /**
     * @return Video[]
     */
    public function parse(): array;
}