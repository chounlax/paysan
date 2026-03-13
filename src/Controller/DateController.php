<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\DateFormType;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Date;
use Doctrine\ORM\EntityManagerInterface;


class DateController extends AbstractController
{
    #[Route('/date', name: 'app_date')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
        $date = new Date();
        $form = $this->createForm(DateFormType::class , $date);
        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                        $em->persist($date);
                        $em->flush();
                        $this->addFlash('notice','Message envoyé') ;
                        return $this->redirectToRoute('app_date');
                       
                    
                    }
            }
        
        return $this->render('date/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
