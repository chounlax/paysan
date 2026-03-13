<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ParcelleType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Parcelle;
use Doctrine\ORM\EntityManagerInterface;


final class ParcelleController extends AbstractController
{


    #[Route('/parcelle', name: 'app_parcelle')]
    public function contact(Request $request, EntityManagerInterface $em): Response
    {
        $parcelle = new Parcelle();
        $form = $this->createForm(ParcelleType::class, $parcelle);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($parcelle);
                $em->flush();
                $this->addFlash('notice', 'Message envoyé');
                return $this->redirectToRoute('app_parcelle');
            }
        }
        return $this->render('parcelle/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
