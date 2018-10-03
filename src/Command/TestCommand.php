<?php

namespace MyApp\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Doctrine\DBAL\Driver\Connection;

class TestCommand extends Command
{
    public function configure()
    {
        $this->setName('test')
            ->setDescription('test description')
            ->setHelp('test help');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("Test output");
    }
}

