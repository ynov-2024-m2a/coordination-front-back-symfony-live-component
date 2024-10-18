<?php

namespace App\Service;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

/**
 * Collection of exotic animals.
 *
 * @implements IteratorAggregate<string>
 *
 * @internal
 */
final class AnimalCollection implements IteratorAggregate, Countable
{
    private array $animals;

    public function __construct(array $animals = [])
    {
        $this->animals = $animals ?: $this->loadAnimals();
    }

    public function paginate(int $page, int $perPage): self
    {
        return new self(array_slice($this->animals, ($page - 1) * $perPage, $perPage));
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->animals);
    }

    public function count(): int
    {
        return count($this->animals);
    }

    private function loadAnimals(): array
    {
        return [
            ['name' => 'Lemur', 'emoji' => '🐒', 'description' => 'Lemur from Madagascar'],
            ['name' => 'Panda', 'emoji' => '🐼', 'description' => 'Giant Panda from China'],
            ['name' => 'Koala', 'emoji' => '🐨', 'description' => 'Koala from Australia'],
            ['name' => 'Flamingo', 'emoji' => '🦩', 'description' => 'Flamingo from Africa'],
            ['name' => 'Jaguar', 'emoji' => '🐆', 'description' => 'Jaguar from the Amazon'],
            ['name' => 'Kangaroo', 'emoji' => '🦘', 'description' => 'Kangaroo from Australia'],
            ['name' => 'Toucan', 'emoji' => '🌺', 'description' => 'Toucan from the Amazon'],
            ['name' => 'Orangutan', 'emoji' => '🦧', 'description' => 'Orangutan from Borneo'],
            ['name' => 'Penguin', 'emoji' => '🐧', 'description' => 'Penguin from Antarctica'],
            ['name' => 'Elephant', 'emoji' => '🐘', 'description' => 'Elephant from Africa'],
            ['name' => 'Gorilla', 'emoji' => '🦍', 'description' => 'Gorilla from Africa'],
            ['name' => 'Zebra', 'emoji' => '🦓', 'description' => 'Zebra from Africa'],
            ['name' => 'Hippopotamus', 'emoji' => '🦛', 'description' => 'Hippopotamus from Africa'],
            ['name' => 'Rhino', 'emoji' => '🦏', 'description' => 'Rhino from Africa'],
            ['name' => 'Lion', 'emoji' => '🦁', 'description' => 'Lion from Africa'],
            ['name' => 'Tiger', 'emoji' => '🐅', 'description' => 'Tiger from Asia'],
            ['name' => 'Polar Bear', 'emoji' => '🐻', 'description' => 'Polar Bear from the Arctic'],
            ['name' => 'Pangolin', 'emoji' => '🦨', 'description' => 'Pangolin from Africa'],
            ['name' => 'Giraffe', 'emoji' => '🦒', 'description' => 'Giraffe from Africa'],
            ['name' => 'Sloth', 'emoji' => '🦥', 'description' => 'Sloth from Central America'],
            ['name' => 'Armadillo', 'emoji' => '🦔', 'description' => 'Armadillo from South America'],
            ['name' => 'Meerkat', 'emoji' => '🦡', 'description' => 'Meerkat from Africa'],
            ['name' => 'Cheetah', 'emoji' => '🐆', 'description' => 'Cheetah from Africa'],
            ['name' => 'Walrus', 'emoji' => '🦭', 'description' => 'Walrus from the Arctic'],
            ['name' => 'Otter', 'emoji' => '🦦', 'description' => 'Otter from North America'],
            ['name' => 'Red Panda', 'emoji' => '🦊', 'description' => 'Red Panda from Asia'],
            ['name' => 'Bison', 'emoji' => '🦬', 'description' => 'Bison from North America'],
            ['name' => 'Moose', 'emoji' => '🦌', 'description' => 'Moose from North America'],
            ['name' => 'Camel', 'emoji' => '🐪', 'description' => 'Camel from the Middle East'],
            ['name' => 'Alpaca', 'emoji' => '🦙', 'description' => 'Alpaca from South America'],
            ['name' => 'Llama', 'emoji' => '🦙', 'description' => 'Llama from South America'],
            ['name' => 'Peacock', 'emoji' => '🦚', 'description' => 'Peacock from India'],
            ['name' => 'Parrot', 'emoji' => '🦜', 'description' => 'Parrot from South America'],
            ['name' => 'Dolphin', 'emoji' => '🐬', 'description' => 'Dolphin from the Ocean'],
            ['name' => 'Shark', 'emoji' => '🦈', 'description' => 'Shark from the Ocean'],
            ['name' => 'Whale', 'emoji' => '🐋', 'description' => 'Whale from the Ocean']
        ];
    }
}
