<?php declare(strict_types=1);

namespace App\Command;

use App\Entity\SomeComplexData;
use App\Storage\AwesomeStorage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class BuildComplexDataCache extends Command
{
    protected static $defaultName = "app:complex-data:build-cache";

    /**
     * @var AwesomeStorage
     */
    private $storage;

    /**
     * @param AwesomeStorage $storage
     */
    public function __construct (AwesomeStorage $storage)
    {
        parent::__construct();
        $this->storage = $storage;
    }


    /**
     * @inheritdoc
     */
    protected function execute (InputInterface $input, OutputInterface $output) : ?int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title("Building ComplexData cache");

        $io->section("Clear existing cache");
        if ($this->storage->clear())
        {
            $io->writeln("<fg=green>done.</>");
        }
        else
        {
            $io->writeln("<fg=red>failed.</>");
        }
        $io->newLine();

        $io->section("Build cache");
        $complexData = new SomeComplexData();
        $complexData->setFoo("a");
        $complexData->setBar("b");
        $complexData->setHello("c");
        $complexData->setWorld("d");

        if ($this->storage->store($complexData))
        {
            $io->writeln("<fg=green>done.</>");
        }
        else
        {
            $io->writeln("<fg=green>done.</>");
        }
        $io->newLine();

        $io->section("Retrieving and checking cached data");
        dump($this->storage->get());

        $io->success("All done.");

        return 0;
    }
}
