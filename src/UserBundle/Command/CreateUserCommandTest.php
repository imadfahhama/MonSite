<?php


namespace UserBundle\Command;

use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class CreateUserCommandTest extends KernetTestCase
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