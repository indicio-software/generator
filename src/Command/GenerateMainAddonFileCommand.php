<?php

namespace Indicio\Generator\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;

use Coduo\PHPHumanizer\StringHumanizer;

class GenerateMainAddonFileCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'create:whmcs:addon';

    protected function configure()
    {
        $this->setDescription('Create new addon module for WHMCS');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $helper = $this->getHelper('question');

        $question = new Question('What is the module slug? ');

        $moduleSlug = $helper->ask($input, $output, $question);
        $output->writeln('You have chosen: '.$moduleSlug);

        $defaultName = StringHumanizer::humanize($moduleSlug);
        $nameQuestion = new Question('What is the module name? [<info>'.$defaultName.'</info>] ', $defaultName);

        $moduleName = $helper->ask($input, $output, $nameQuestion);
    }
}
