<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class GenreController extends AbstractController
{
    #[Route('admin/creategenre', name: 'genre_create')]
    public function create(): Response
    {
        return $this->render('genre/index.html.twig', [
            'controller_name' => 'GenreController',
        ]);
    }
}
