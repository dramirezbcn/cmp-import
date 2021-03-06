<?php

namespace Tests\Infrastructure\VideoBundle\Command;

use Infrastructure\VideoBundle\Command\ImportConsoleCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class ImportConsoleCommandTest extends KernelTestCase
{
    public function testExecuteGlorf()
    {
        self::bootKernel();
        $application = new Application(self::$kernel);

        $application->add(new ImportConsoleCommand());

        $command = $application->find('import');
        $commandTester = new CommandTester($command);

        $result = $commandTester->execute(array(
            'command' => $command->getName(),
            'type' => 'glorf'
        ));

        self::assertEquals(0, $result);
    }

    public function testExecuteFlub()
    {
        self::bootKernel();
        $application = new Application(self::$kernel);

        $application->add(new ImportConsoleCommand());

        $command = $application->find('import');
        $commandTester = new CommandTester($command);

        $result = $commandTester->execute(array(
            'command' => $command->getName(),
            'type' => 'flub'
        ));

        self::assertEquals(0, $result);
    }
}