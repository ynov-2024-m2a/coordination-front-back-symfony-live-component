<?php

namespace App\Message;

use App\Entity\Animal;
use Doctrine\Common\Collections\Collection;

class MessageManager
{
    public function generateMessage(Collection $animals, string $name): string
    {
        $animalCount = $animals->count();
        $animalStrings = $animals->map(function (Animal $animal) {
            return $animal->getName();
        });

        $animalLabel = $animalCount > 1 ? 'des animaux' : 'un animal';

        $animalsList = implode($animalCount > 2 ? ', ' : ' et ', $animalStrings->toArray());

        return sprintf(
            '%s, tu as choisi %s %s. Voici ce que tu as sélectionné : %s.',
            $name,
            $animalLabel,
            $this->getCuteWord($animalCount),
            $animalsList
        );
    }

    private function getCuteWord(int $animalCount): string
    {
        if ($animalCount === 1) {
            return 'mignon';
        } elseif ($animalCount > 1 && $animalCount <= 3) {
            return 'adorables';
        } else {
            return 'tout doux';
        }
    }
}
