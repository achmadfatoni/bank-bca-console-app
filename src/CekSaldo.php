<?php

namespace Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CekSaldo extends Command
{
    protected function configure()
    {
        $this->setName('cek-saldo')
            ->setDescription('Cek saldo rekening');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("checking balance");
    }

}