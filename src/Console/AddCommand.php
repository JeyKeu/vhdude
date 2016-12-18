<?php
namespace JeyKeu\VhDude\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;


class AddCommand extends Command
{
    private $hostName;
    private $webAppPath;

    private function setHostname($hostName)
    {
        $this->hostName = $hostName;
    }

    private function setWebAppPath($webAppPath)
    {
        $this->webAppPath = $webAppPath;
    }

    protected function configure()
    {
        parent::configure();
        $this->setName('add')->setDescription('Adds a new virtual host');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');
        $hostNameQuestion = new Question('Enter a hostname for your web app (example.com)');
        $hostName = '';
        while ($hostName == '') {
            $hostName = $helper->ask($input, $output, $hostNameQuestion);
        }
        $this->setHostname($hostName);
        $webAppQuestion = new Question('Enter a hostname for your web app (example.com)');
        $webAppPath = '';
        while ($webAppPath == '') {
            $webAppPath = $helper->ask($input, $output, $webAppQuestion);
        }
        $this->setWebAppPath($webAppPath);
    }

}