<?php

namespace App\Console\App;

use Noodlehaus\Config;
use Symfony\Component\Console\Helper\Table;
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
        $config = $this->config->all();

        foreach($config as $key => $item) {
            $output->writeln('<info>' . ucfirst($key) . '</info>');

            $table = new Table($output);
            $rows = [];

            foreach($item as $key => $value) {
                if (is_array($value)) {
                    array_push($rows, implode(', ', $value));
                } else {
                    array_push($rows, $value);
                }
            }
            $table
                ->setHeaders(array_map('ucwords', array_keys($item)))
                ->setRows(array(
                    $rows
                ));
            $table->render();
            $output->writeln('');
        }
    }
}
