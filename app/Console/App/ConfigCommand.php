<?php

namespace App\Console\App;

use Noodlehaus\Config;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConfigCommand extends Command
{
    protected $config;
    protected function configure()
    {
        $this->setName('app:config')
            ->setDescription('Show the config stored on our application')
            ->setHelp('No help required, I am a simple sanity check command.');
        $this->config = new Config(__DIR__ . '/../../../config');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('<info>Application config:</info>');
        $output->writeln('<info>App Name: ' . $this->config->get('app.name') . '</info>');
    }
}
