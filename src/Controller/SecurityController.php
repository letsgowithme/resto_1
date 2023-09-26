<?php

namespace App\Controller;

use App\Repository\ScheduleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route('/connexion', name: 'app_login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils,
    ScheduleRepository $scheduleRepository): Response
    { 
        /**
        * This controller allows us to login
        *
        * @param AuthenticationUtils $authenticationUtils
        * @return Response
        */
        $schedules = $scheduleRepository->findAll(); 

        return $this->render('security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
            'schedules' => $schedules,
        ]);
    }

     /**
     * This controller allows us to logout
     *
     * @return void
     */

    #[Route('/deconnexion', name: 'app_logout')]
    public function logout() {
        // Nothing to do here
    }

   
 }