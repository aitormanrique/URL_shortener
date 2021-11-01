<?php


namespace App\Admin\Dashboard;


use App\Admin\Cruds\UrlCrud;
use App\Entity\Urls;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

class MyDashboard extends AbstractDashboardController
{

    public function index(): Response
    {
        // redirect to some CRUD controller
        $routeBuilder = $this->get(AdminUrlGenerator::class);

        return $this->redirect($routeBuilder->setController(UrlCrud::class)->generateUrl());


        // you can also render some template to display a proper Dashboard
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        // return $this->render('welcome.html.twig');
    }
    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('MI CMS');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Usuarios', 'fas fa-user', User::class)
            ->setPermission('ROLE_SUPER_ADMIN');

        yield MenuItem::linkToCrud('URLs', 'fas fa-route', Urls::class);

    }
    }