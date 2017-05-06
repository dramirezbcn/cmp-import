<?php

namespace Infrastructure\VideoBundle\Command;

use Application\UseCase\Parser\Request\ParseRequest;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ImportConsoleCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('import')
            ->setDescription("Import the videos.")
            ->addArgument('type', InputArgument::REQUIRED, 'Type of the file to import: glorf or flub');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $importCommand = $this->getContainer()->get('import.command');

            $importCommand->import(
                new ParseRequest($input->getArgument('type'))
            );

        } catch (\Exception $ex) {
            $output->writeln('Error ' . $ex->getMessage());
        }
    }
}