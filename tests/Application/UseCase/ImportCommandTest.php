<?php

namespace Tests\Application\UseCase;

use Application\UseCase\ImportCommand;
use Application\UseCase\Parser\Request\ParseRequest;
use Domain\Parser\Exception\ParserNotFoundException;
use Domain\Parser\Parser;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ImportCommandTest extends KernelTestCase
{
    /** @var  ImportCommand */
    private $importCommand;

    protected function setUp()
    {
        self::bootKernel();
        $this->importCommand = self::$kernel->getContainer()->get('import.command');
    }

    public function testCommandFlub()
    {
        $this->importCommand->import(new ParseRequest(Parser::FLUB));

        //I'd check if there're the imported videos on the database but in this case we don't persist
    }

    public function testCommandIncorrect()
    {
        $this->expectException(ParserNotFoundException::class);

        $this->importCommand->import(new ParseRequest('incorrectSource'));
    }
}
