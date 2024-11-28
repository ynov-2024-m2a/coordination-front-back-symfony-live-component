<?php

namespace App\Command;

use App\Entity\Animal;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'app:load-data', description: 'Resets and loads all the data needed in the database')]
class LoadDataCommand extends Command
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $this->clearEntity(Animal::class, $io);
        $io->info('Growing animals...');
        $this->growAnimal($io);

        return Command::SUCCESS;
    }

    private function growAnimal(SymfonyStyle $io): void
    {
        $animals = [
            'Lemur',
            'Panda',
            'Koala',
            'Flamingo',
            'Jaguar',
            'Kangaroo',
            'Toucan',
            'Orangutan',
            'Penguin',
            'Elephant',
            'Gorilla',
            'Zebra',
            'Hippopotamus',
            'Rhino',
            'Lion',
            'Tiger',
            'Polar Bear',
            'Pangolin',
            'Giraffe',
            'Sloth',
            'Armadillo',
            'Meerkat',
            'Cheetah',
            'Walrus',
            'Otter',
            'Red Panda',
            'Bison',
            'Moose',
            'Camel',
            'Alpaca',
            'Llama',
            'Peacock',
            'Parrot',
            'Dolphin',
            'Shark',
            'Whale'
        ];

        $this->clearEntity(Animal::class, $io);

        foreach ($animals as $animal) {
            $entity = new Animal();
            $entity->setName($animal);
            $io->write([$animal, ' ']);

            $this->entityManager->persist($entity);
        }
        $io->writeln('');

        $this->entityManager->flush();
    }

    private function clearEntity(string $className, SymfonyStyle $io): void
    {
        $io->writeln(\sprintf('Clearing <comment>%s</comment>', $className));
        $this->entityManager
            ->createQuery('DELETE FROM '.$className)
            ->execute();
    }
}
