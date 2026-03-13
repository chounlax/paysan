<?php

namespace App\Controller;

use App\Entity\Parcelle;
use App\Form\ParcelleType;
use App\Repository\ParcelleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\ModifierParcelleType;
use App\Form\SupprimerParcelleType;

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

    #[Route('/liste-parcelle', name: 'app_liste-parcelle', methods: ['GET', 'POST'])]
    public function parcelle(Request $request, ParcelleRepository $parcelleRepository, EntityManagerInterface $em): Response
    {
        $parcelles = $parcelleRepository->findAll();
        $form = $this->createForm(SupprimerParcelleType::class, null, [
            'parcelles' => $parcelles,
        ]);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $selectedParcelles = $form->get('parcelles')->getData();
            if (count($selectedParcelles)){
            foreach ($selectedParcelles as $parcelle) {
                $em->remove($parcelle);
            }
            $em->flush();
            $this->addFlash('notice', 'Catégories supprimées avec succès');
        }
            return $this->redirectToRoute('app_liste-parcelle');
        }
        return $this->render('parcelle/liste-parcelle.html.twig', [
            'parcelles' => $parcelles,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/supprimer-parcelle/{id}', name: 'app_supprimer-parcelle')]
    public function supprimerParcelle(Request $request, Parcelle $parcelle, EntityManagerInterface $em): Response
    {
        if ($parcelle != null) {
            $em->remove($parcelle);
            $em->flush();
            $this->addFlash('notice', 'Catégorie supprimée');
        }
        return $this->redirectToRoute('app_liste-parcelle');
    }

    #[Route('/modifier-parcelle/{id}', name: 'app_modifier-parcelle')]
    public function modifierParcelle(Request $request, Parcelle $parcelle, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(ModifierParcelleType::class, $parcelle);
        if($request->isMethod('POST')){
            $form->handleRequest($request);
            if ($form->isSubmitted()&&$form->isValid()){
            $em->persist($parcelle);
            $em->flush();
            $this->addFlash('notice','Catégorie modifiée');
            return $this->redirectToRoute('app_liste-parcelle');
            }
            }
           
        return $this->render('parcelle/modifier-parcelle.html.twig', [
            'form' => $form->createView(),
        ]);
    }

}
