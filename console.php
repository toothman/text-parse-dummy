<?php
require_once('vendor/autoload.php');

use Symfony\Component\Console\Application;

$console = new Application();

$console->add(new \Commands\InputParserCommand());

$console->run();
