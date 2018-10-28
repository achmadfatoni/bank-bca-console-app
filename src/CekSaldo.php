<?php

namespace Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
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

        $bcaParser = new BCAParser(getenv('USERNAME'),getenv('PASSWORD'));
        $saldoList = $bcaParser->getSaldo();
        $bcaParser->logout();

        $table = new Table($output);
        $mappingSaldo = [];
        foreach ($saldoList as $saldo) {
            $mappingSaldo[] = [
                $saldo['rekening'],
                $saldo['saldo'],
            ];
        }

        if(empty($mappingSaldo)) {
           $output->writeln('<info>Tidak ada rekening</info>');
           return;
        }

        $table->setHeaders(['Rekening', 'Saldo'])
            ->setRows($mappingSaldo);
        $table->render();
    }

}