<?php

namespace App\Console\Migrate;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ResetCommand extends Command
{
    protected function configure()
    {
        $this->setName('migration:reset')
            ->setDescription('Rollback all migrations')
            ->setHelp('A command to rollback all migrations');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Booting up migration magic</info>');
        exec('php vendor/bin/phinx rollback -t 0');
    }
}
