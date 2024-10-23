<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TypesController extends AbstractController
{
    #[Route('/types', name: 'app_types')]
    public function index(): Response
    {
        return $this->render('types/index.html.twig', [
            'controller_name' => 'TypesController',
        ]);
    }
}
