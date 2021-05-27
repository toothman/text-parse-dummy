<?php

namespace Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use ArrayParser;



class InputParserCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('parse-input')
            ->setDescription('Parse the given input for certain features')
            ->addArgument('input_text', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $input = $input->getArgument('input_text');
     
        $test = new ArrayParser;
        $result = $test->parse($input);

        var_dump($result);
        /**************
         * Todo: Implement something that creates all extracted features from given input
         **************/

        return 0;
    }
}
