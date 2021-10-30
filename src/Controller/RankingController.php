<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;


class RankingController extends AbstractController
{

    public function index(Environment $twig): Response
    {
        return new Response($twig->render('index.html.twig', ['value' => 'patatas fritas']));
    }
}