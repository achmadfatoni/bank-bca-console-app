<?php

namespace Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Mutasi extends Command
{
    protected function configure()
    {
        $this->setName('mutasi')
            ->setDescription('Cek mutasi rekening');

        $this->addOption('from', 'f', InputOption::VALUE_REQUIRED, 'Dari tanggal.')
            ->addOption('to', 't', InputOption::VALUE_REQUIRED, 'Ke tanggal');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $fromDate = $input->getOption('from');
        $toDate = $input->getOption('to');

        if (!empty($toDate) && empty($fromDate)) {
            $output->writeln('<error>from date value (--from|-f)required</error>');
            return;
        }

        if(empty($fromDate) && empty($toDate)) {
            $fromDate = date('Y-m-d');
            $toDate = date('Y-m-d');
        }

        $output->writeln("cek mutasi rekening dari {$fromDate} ke {$toDate}");
        $bcaParser = new BCAParser(getenv('USERNAME'),getenv('PASSWORD'));
        $transactions = $bcaParser->getListTransaksi($fromDate,$toDate);
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

        if(empty($mappingTransactions)) {
           $output->writeln('<info>Tidak ada transaksi</info>');
           return;
        }
        $table->setHeaders(['Tanggal', 'Deskripsi', 'Jumlah'])
            ->setRows($mappingTransactions);
        $table->render();
    }

}