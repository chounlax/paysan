<?php

namespace App\Controller;

use App\Entity\Unite;
use App\Form\UniteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class UniteController extends AbstractController
{
    #[Route('/unite', name: 'app_unite')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $unite = new Unite();
        $form = $this->createForm(UniteType::class, $unite);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em->persist($unite);
                $em->flush();
                $this->addFlash('notice', 'Message envoyé');
                return $this->redirectToRoute('app_unite');
            }
        }
        return $this->render('unite/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
