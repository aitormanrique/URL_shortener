<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class RankingController  extends AbstractController
{

    public function index(Environment $twig): Response
    {
        //ESTE CONTROLLER RENDERIZA EL RANKING DE VISITAS DE LAS URLS
        return new Response($twig->render('ranking.html.twig'));
    }

}