<?php

namespace App\Console\Migrate;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class RollbackCommand extends Command
{
    protected function configure()
    {
        $this->setName('migration:rollback')
            ->setDescription('Rollback the last migration')
            ->setHelp('A command to rollback the previous migration');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Booting up migration magic</info>');
        exec('php vendor/bin/phinx rollback');
    }
}
