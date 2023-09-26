<?php

namespace App\Controller\Admin;

use App\Entity\Allergy;
use App\Entity\Card;
use App\Entity\Category;
use App\Entity\DaySlot;
use App\Entity\DinnerHours;
use App\Entity\Dish;
use App\Entity\EveningSlot;
use App\Entity\Gallery;
use App\Entity\LunchHours;
use App\Entity\Menu;
use App\Entity\Places;
use App\Entity\Restaurant;
use App\Entity\Schedule;
use App\Entity\Reservation;
use App\Entity\Table;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    // #[IsGranted('ROLE_ADMIN')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }
//     public function __construct(
//             private AdminUrlGenerator $adminUrlGenerator
//     ){}

//     #[Route('/admin', name: 'admin')]
//     public function index(): Response
//     {
//         $url =  $this->adminUrlGenerator->setController(ScheduleCrudController::class)
//         ->generateUrl();
//         return $this->redirect($url);
       

        
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Administration')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('Vers le site', 'fas fa-list', 'home');
        yield MenuItem::linkToCrud('Reservations', 'fas fa-list', Reservation::class);
        yield MenuItem::linkToCrud('Heure du midi', 'fas fa-list', LunchHours::class);
        yield MenuItem::linkToCrud('Heure du soir', 'fas fa-list', DinnerHours::class);
        yield MenuItem::linkToCrud('Menu', 'fas fa-list', Menu::class);
        yield MenuItem::linkToCrud('Galerie', 'fas fa-list', Card::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Plats', 'fas fa-list', Dish::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Horaires', 'fas fa-list', Schedule::class);
        yield MenuItem::linkToCrud('Allergie', 'fas fa-list', Allergy::class);       
      
      
       
    }
}
