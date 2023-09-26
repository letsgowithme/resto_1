<?php

namespace App\Controller;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/category')]
class CategoryController extends AbstractController
{
    #[Route('/', name: 'app_category_index', methods: ['GET'])]
    public function index(CategoryRepository $categoryRepository,
    ScheduleRepository $scheduleRepository): Response
    {
        $categories = $categoryRepository->findAll();
        $schedules = $scheduleRepository->findAll();
        
        return $this->render('category/index.html.twig', [
            'categories' => $categories,
            'schedules' => $schedules,
        ]);
    }
   

    #[Route('/{id}', name: 'app_category_show', methods: ['GET'])]
    public function show(Category $category,
    ScheduleRepository $scheduleRepository): Response
    {
        $schedules = $scheduleRepository->findAll();
        return $this->render('category/show.html.twig', [
            'category' => $category,
            'schedules' => $schedules,
        ]);
    }
    
}
