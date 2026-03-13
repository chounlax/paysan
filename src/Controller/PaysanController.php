<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PaysanController extends AbstractController
{
    #[Route('', name: 'app_paysan')]
    public function index(): Response
    {
        return $this->render('paysan/index.html.twig');
    }

}
