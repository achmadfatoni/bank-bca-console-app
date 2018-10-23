<?php

namespace Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Mutasi extends Command
{
    protected function configure()
    {
        $this->setName('mutasi')
            ->setDescription('Cek mutasi rekening');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("cek mutasi rekening...");
        $bcaParser = new BCAParser(getenv('USERNAME'),getenv('PASSWORD'));
        $transactions = $bcaParser->getListTransaksi('2018-10-01','2018-10-20');
        $bcaParser->logout();
        $table = new Table($output);
        $mappingTransactions = [];
        foreach ($transactions as $transaction) {
            $mappingTransactions[] = [
                $transaction['date'],
                $transaction['description'][0],
                end($transaction['description']),
            ];
        }
        $table->setHeaders(['Tanggal', 'Deskripsi', 'Jumlah'])
            ->setRows($mappingTransactions);
        $table->render();
    }

}