<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\AnimalForm;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_landing', methods: ['GET', 'POST'])]
    public function index(Request $request): Response
    {
        $form = $this->createForm(AnimalForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $this->addFlash(
                'autocomplete_success',
                $this->generateEatingMessage(
                    $data['animals'],
                    $data['name']
                )
            );
        }

        return $this->render('landing/index.html.twig', [
            'form' => $form,
        ]);
    }

     private function getDeliciousWord(): string
    {
        $words = ['delicious', 'scrumptious', 'mouth-watering', 'life-changing', 'world-beating', 'freshly-squeezed'];

        return $words[array_rand($words)];
    }

    private function generateEatingMessage(Collection $foods, string $name): string
    {
        $i = 0;
        $foodStrings = $foods->map(function (Animal $food) use (&$i, $foods) {
            ++$i;
            $str = $food->getName();

            if ($i === \count($foods) && $i > 1) {
                $str = 'and '.$str;
            }

            return $str;
        });

        return \sprintf(
            'Time for %s! Enjoy %s %s %s!',
            $name,
            \count($foodStrings) > 1 ? 'some' : 'a',
            $this->getDeliciousWord(),
            implode(\count($foodStrings) > 2 ? ', ' : ' ', $foodStrings->toArray())
        );
    }
}
