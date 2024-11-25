<?php

namespace App\Controller;

use App\Entity\Types;
use App\Form\TypesFormType;
use App\Repository\TypesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TypesController extends AbstractController
{
    #[Route('admin/newtype', name: 'app_types')]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $types = new Types();
        $form = $this->createForm(Types::class, $types);

        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted())
        {
            $types = $form->getData();
            $manager->persist($types);
            $manager->flush();

            return $this->redirectToRoute('view_types');
        }
        return $this->render('types/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    #[Route('admin/types', name :'view_types', methods:['GET'])]
    public function displayTypes(TypesRepository $repository) : Response

    {
        $types = $repository->findAll();

        return $this->render('types/displaytypes.html.twig', [
            'types'=>$types
        ]);
    }

    #[Route('admin/types/update/{id}', name: 'edit_types', methods: ['GET', 'POST'])]
    public function editGenre(TypesRepository $repository, int $id, Request $request, EntityManagerInterface $manager): Response
    {
        $types = $repository->findOneBy(["id" => $id]);
        
        if (!$types) {
            throw $this->createNotFoundException('Type not found');
        }
    
        $form = $this->createForm(TypesFormType::class, $types);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($types);
            $manager->flush();
    
            return $this->redirectToRoute('view_types');
        }
    
        return $this->render('types/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('admin/types/delete/{id}', name : 'delete_type', methods: ['GET'])]
    public function delete(EntityManagerInterface $manager, Types $types) : Response
    {
        $manager->remove($types);
        $manager->flush();

            $this->addFlash(
                'success',
                'Votre type a été supprimé avec succès !'
            );

        return $this->redirectToRoute('view_types');
    }
}
