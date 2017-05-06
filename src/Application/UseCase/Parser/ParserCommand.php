<?php

namespace Application\UseCase\Parser;

use Application\UseCase\Parser\Request\ParseRequest;
use Domain\Parser\Exception\ParserNotFoundException;
use Domain\Parser\Factory\ParserFactoryInterface;
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

    /** @var ParserFactoryInterface */
    private $parserFactory;

    /**
     * ParserCommand constructor.
     * @param ParserInterface $glorfParser
     * @param ParserInterface $flubParser
     * @param ParserFactoryInterface $parserFactory
     */
    public function __construct(
        ParserInterface $glorfParser,
        ParserInterface $flubParser,
        ParserFactoryInterface $parserFactory
    )
    {
        $this->glorfParser = $glorfParser;
        $this->flubParser = $flubParser;
        $this->parserFactory = $parserFactory;
    }

    /**
     * @param ParseRequest $parseRequest
     * @return Video[]
     * @throws ParserNotFoundException
     */
    public function parse(ParseRequest $parseRequest): array
    {
        $parser = $this->parserFactory->create();

        switch($parseRequest->getType()){
            case Parser::GLORF:
                $parser->setParser($this->glorfParser);
                break;
            case Parser::FLUB:
                $parser->setParser($this->flubParser);
                break;
            default:
                throw new ParserNotFoundException($parseRequest->getType() . ' is not a valid parser.');
        }
        return $parser->parse();
    }
}