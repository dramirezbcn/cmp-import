<?php

namespace Application\UseCase;

use Application\UseCase\Parser\ParserCommand;
use Application\UseCase\Parser\Request\ParseRequest;
use Application\UseCase\Video\VideoCommand;

/**
 * Class ImportCommand
 * @package Application\UseCase
 */
class ImportCommand
{
    /** @var ParserCommand */
    private $parserCommand;

    /** @var VideoCommand */
    private $videoCommand;

    /**
     * ImportCommand constructor.
     * @param ParserCommand $parserCommand
     * @param VideoCommand $videoCommand
     */
    public function __construct(ParserCommand $parserCommand, VideoCommand $videoCommand)
    {
        $this->parserCommand = $parserCommand;
        $this->videoCommand = $videoCommand;
    }

    /**
     * @param ParseRequest $request
     */
    public function import(ParseRequest $request)
    {
        $videos = $this->parserCommand->parse($request);

        $this->videoCommand->save($videos);
    }
}