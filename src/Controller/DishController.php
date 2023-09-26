<?php

namespace App\Controller;

use App\Entity\Dish;
use App\Repository\DishRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/plats')]
class DishController extends AbstractController
{
    #[Route('/', name: 'dish.index', methods: ['GET'])]
    public function index(DishRepository $dishRepository): Response
    {
        $dishes = $dishRepository->findAll();
        
        return $this->render('dish/index.html.twig', [
            'dishes' => $dishes,
        ]);
    }

    /**
     * @param Dish $dish
     * @param Request $request
     * @param EntityManagerInterface $manager
     * @return Response
     */
   

    #[Route('/{id}', name: 'dish.show', methods: ['GET'])]
    public function show(Dish $dish): Response
    {
        return $this->render('dish/show.html.twig', [
            'dish' => $dish,
        ]);
    }

}
