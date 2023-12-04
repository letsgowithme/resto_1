<?php

namespace App\Controller;

use App\Repository\CardRepository;
use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(
        CardRepository $cardRepository,
        ScheduleRepository $scheduleRepository
    ): Response
    {
        $cards = $cardRepository->findAll();
        $schedules = $scheduleRepository->findAll(); 
        return $this->render('home/index.html.twig', [
            'cards' => $cards,
        
            'schedules' => $schedules,
            
        ]);
    }

    #[Route('/legal_notice', name: 'footer.legal_notice', methods: ['GET'])]
    public function legalNotice(ScheduleRepository $scheduleRepository 
    ): Response
    {
        $schedules = $scheduleRepository->findAll(); 
        return $this->render('footer/legal_notice.html.twig', [
            'schedules' => $schedules,
        ]);
    }

    #[Route('/privacy', name: 'footer.privacy_policy', methods: ['GET'])]
    public function privacy(ScheduleRepository $scheduleRepository
    ): Response
    {
        $schedules = $scheduleRepository->findAll(); 
        return $this->render('footer/privacy_policy.html.twig', [        
            'schedules' => $schedules,
        ]);
    }
}
