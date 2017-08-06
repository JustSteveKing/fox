<?php

namespace App\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:test')
            ->setDescription('A simple Test Command.')
            ->setHelp('No help required, I do nothing ...');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>A simple Test Command</info>');
    }
}
