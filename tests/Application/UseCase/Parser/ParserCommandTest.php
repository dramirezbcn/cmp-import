<?php

namespace Tests\Application\UseCase\Parser;

use Application\UseCase\Parser\ParserCommand;
use Application\UseCase\Parser\Request\ParseRequest;
use Domain\Parser\Parser;
use Domain\Video\Model\Video;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ParserCommandTest extends KernelTestCase
{
    /** @var  ParserCommand */
    private $parserCommand;

    protected function setUp()
    {
        self::bootKernel();
        $this->parserCommand = self::$kernel->getContainer()->get('parser.command');
    }

    public function testCommandFlub()
    {
        $videos = $this->parserCommand->parse(new ParseRequest(Parser::FLUB));

        self::assertCount(4, $videos);
        foreach ($videos as $video){
            self::assertInstanceOf(Video::class, $video);
        }
    }
}
