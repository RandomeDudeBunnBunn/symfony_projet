<?php

namespace App\Controller;

use App\Entity\Burger;
use App\Form\BurgerType;
use App\Repository\BurgerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

#[Route('/burger', name: 'burger_')]
class BurgerController extends AbstractController
{
    #[Route('', name: 'creation', methods: ['GET', 'POST'])]
    public function creation(Request $request, EntityManagerInterface $em): Response
    {
        $burger = new Burger();
        $form = $this->createForm(BurgerType::class, $burger);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($burger);
            $em->flush();

            $this->addFlash('success', 'Burger créé!');
            return $this->redirectToRoute('burger_liste');
        }

        return $this->render('burger/ajout_burger.html.twig', [
            'burger' => $burger,
            'form' => $form
        ]);
    }

    #[Route('/liste', name: 'liste')]
    public function liste(BurgerRepository $burgerRepository): Response
    {
        $burgers = $burgerRepository->findAll();

        return $this->render('burger/liste_burger.html.twig', [
            'burgers' => $burgers,
        ]);
    }

    #[Route('/{id\<d+>}/update', name: 'modification', methods: ['GET', 'POST'])]
    public function modification(Burger $burger, Request $request, EntityManagerInterface $em, BurgerRepository $burgerRepository): Response
    {
        $burger = $burgerRepository->find($burger);
        $form = $this->createForm(BurgerType::class, $burger);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();

            $this->addFlash('success', 'Burger modifié!');
            return $this->redirectToRoute('burger_liste');
        }

        return $this->render('burger/ajout_burger.html.twig', [
            'burger' => $burger,
            'form' => $form
        ]);
    }

    #[Route('{id\<d+>}/supprimer', name: 'supprimer', methods: ['GET', 'DELETE'])]
    public function supprimer(Burger $burger, Request $request, EntityManagerInterface $em): RedirectResponse
    {
        // Utilisation d'un token de suppression peut être intéressant dans le cours.
        $em->remove($burger);
        $em->flush();
        $this->addFlash('success', 'Burger supprimé!');

        return $this->redirectToRoute('burger_liste');

    }
}
