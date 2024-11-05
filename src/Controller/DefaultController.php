<?php

namespace App\Controller;

use App\Form\AnimalForm;
use App\Message\MessageManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_landing', methods: ['GET', 'POST'])]
    public function index(Request $request, MessageManager $messageManager): Response
    {
        $form = $this->createForm(AnimalForm::class);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $this->addFlash(
                'autocomplete_success',
                $messageManager->generateMessage(
                    $data['animals'],
                    $data['name']
                )
            );

            return $this->redirectToRoute('app_landing');
        }

        return $this->render('landing/index.html.twig', [
            'form' => $form,
        ]);
    }
}
