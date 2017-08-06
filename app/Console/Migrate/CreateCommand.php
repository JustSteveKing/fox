<?php

namespace App\Console\Migrate;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateCommand extends Command
{
    protected function configure()
    {
        $this->setName('migration:create')
            ->addArgument('name', InputArgument::REQUIRED, 'What do you want to call your migration?')
            ->setDescription('Create a new Database Migration.')
            ->setHelp('Add a name for your migration');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $output->writeln('<info>Creating migration ' . $name . '</info>');
        exec('php vendor/bin/phinx create ' . $name);
    }
}
