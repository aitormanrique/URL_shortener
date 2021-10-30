<?php


namespace App\Admin\Dashboard;


use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use Symfony\Component\HttpFoundation\Response;

class MyDashboard extends AbstractDashboardController
{

    public function index(): Response
    {
        return $this->render('index.html.twig', ['value' => 'jelouuuuuuuuuu']);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Mis cojoncios');
    }

}