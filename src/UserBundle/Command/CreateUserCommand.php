<?php

// src/AppBundle/Command/CreateUserCommand.php
namespace UserBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUserCommand extends Command
{
    protected function configure()
    {
        $this
        ->setName('app:create-user')
        ->setDescription('Creates a new user')
        ->setHelp('This Command allows you to create a user');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $userManager= $this->getContainer()->get('app.user_manager');
        $userManager->create($input->getArgument('username'));

        $output->writeln("User successfuly generated!");
    }
}