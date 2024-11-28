<?php

namespace App\Twig\Components;

use App\Service\AnimalCollection;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveAction;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\ComponentToolsTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

#[AsLiveComponent('AnimalGrid')]
class AnimalGrid
{
    use ComponentToolsTrait;
    use DefaultActionTrait;

    private const PER_PAGE = 9;

    #[LiveProp]
    public int $page = 1;

    public function __construct(private readonly AnimalCollection $animals)
    {
    }

    public function getItems(): array
    {
        $items = [];
        $animals = $this->animals->paginate($this->page, self::PER_PAGE);
        foreach ($animals as $i => $animal) {
            $items[] = [
                'id' => ($this->page - 1) * self::PER_PAGE + $i,
                'name' => $animal['name'],
                'emoji' => $animal['emoji'],
                'description' => $animal['description'],
            ];
        }

        return $items;
    }

    #[ExposeInTemplate('per_page')]
    public function getPerPage(): int
    {
        return self::PER_PAGE;
    }

    public function hasMore(): bool
    {
        return count($this->animals) > ($this->page * self::PER_PAGE);
    }

    #[LiveAction]
    public function more(): void
    {
        ++$this->page;
    }
}
