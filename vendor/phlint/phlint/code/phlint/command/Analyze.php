<?php

namespace phlint\command;

use \luka8088\phops\MetaContext;
use \phlint\Application;
use \Symfony\Component\Console\Input\InputArgument;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Input\InputOption;
use \Symfony\Component\Console\Output\OutputInterface;

class Analyze extends \Symfony\Component\Console\Command\Command {

  function configure () {
    $this
      ->setName('analyze')
      ->setDescription('Analyze PHP code.')
      ->setHelp('Statically analyze PHP code and report any issues found.')
      ->addArgument(
        'paths',
        InputArgument::IS_ARRAY | InputArgument::OPTIONAL,
        'Paths to source code to analyze.'
      )
      ->addOption(
        'report-junit',
        null,
        InputOption::VALUE_REQUIRED,
        'Path to output a JUnit report to.'
      )
    ;
  }

  function execute (InputInterface $input, OutputInterface $output) {

    $paths = $input->getArgument('paths');

    if (count($paths) > 0) {
      MetaContext::get(Application::class)->code = [];
      foreach ($paths as $path)
        MetaContext::get(Application::class)->addPath($path);
    }

    $junitReport = $input->getOption('report-junit');
    if ($junitReport)
      MetaContext::get(Application::class)[] = new \phlint\report\JUnit(fopen($junitReport, 'w'));

    MetaContext::get(Application::class)->analyze();

  }

}
