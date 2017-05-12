<?php

namespace Domain\Parser;

use Domain\Video\Model\Video;

/**
 * Class Parser
 */
class Parser
{
    const   FLUB = 'flub',
            GLORF = 'glorf';

    /** @var  ParserInterface */
    private $parser;

    /** @var  string */
    private $file;

    /**
     * @return Video[]
     */
    public function parse(): array
    {
        return $this->parser->parse();
    }

    /**
     * @param ParserInterface $parser
     */
    public function setParser(ParserInterface $parser)
    {
        $this->parser = $parser;
    }

    /**
     * @param string $file
     */
    public function setFile(string $file)
    {
        $this->file = $file;
    }
}