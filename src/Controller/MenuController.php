<?php

namespace App\Controller;

use App\Entity\Menu;
use App\Form\MenuType;
use App\Repository\MenuRepository;
use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;


#[Route('/menu')]
class MenuController extends AbstractController
{
    #[Route('/', name: 'menu.index', methods: ['GET'])]
    public function index(MenuRepository $menuRepository,
    ScheduleRepository $scheduleRepository): Response
    {
        $schedules = $scheduleRepository->findAll(); 
        return $this->render('menu/index.html.twig', [
            'menus' => $menuRepository->findAll(),
            'schedules' => $schedules,
        ]);
    }

    #[Route('/{id}', name: 'menu.show', methods: ['GET'])]
    public function show(Menu $menu): Response
    {
        return $this->render('menu/show.html.twig', [
            'menu' => $menu,
        ]);
    }
   
 
}
