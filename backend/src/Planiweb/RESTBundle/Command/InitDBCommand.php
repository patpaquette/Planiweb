<?php

namespace Planiweb\RESTBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Planiweb\RESTBundle\Services\DBServices;

class InitDBCommand extends ContainerAwareCommand
{
	protected function configure()
	{
		$this
			->setName('planiweb:initdb')
			->setDescription('Populates the db with needed initial values')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{

		$dbServices = $this->getContainer()->get("DbServices");
		$dbServices->addDefaultEntries();
	}
}
