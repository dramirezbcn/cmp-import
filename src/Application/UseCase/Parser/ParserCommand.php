<?php

namespace Application\UseCase\Parser;

use Application\UseCase\Parser\Request\ParseRequest;
use Domain\Parser\Parser;
use Domain\Parser\ParserInterface;
use Domain\Video\Model\Video;

/**
 * Class ParserCommand
 * @package Application\UseCase\Parser
 */
class ParserCommand
{
    /** @var ParserInterface */
    private $glorfParser;

    /** @var ParserInterface */
    private $flubParser;

    /**
     * ParserCommand constructor.
     * @param ParserInterface $glorfParser
     * @param ParserInterface $flubParser
     */
    public function __construct(ParserInterface $glorfParser, ParserInterface $flubParser)
    {
        $this->glorfParser = $glorfParser;
        $this->flubParser = $flubParser;
    }

    /**
     * @param ParseRequest $parseRequest
     * @return Video[]
     */
    public function parse(ParseRequest $parseRequest): array
    {
        $parser = new Parser();

        switch($parseRequest->getType()){
            case Video::GLORF:
                $parser->setParser($this->glorfParser);
                break;
            case Video::FLUB:
                $parser->setParser($this->flubParser);
                break;
        }
        return $parser->parse();
    }
}