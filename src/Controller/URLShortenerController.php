<?php


namespace App\Controller;


use App\Repository\UrlsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;


class URLShortenerController extends AbstractController
{

    public function index(Environment $twig): Response
    {
        //ESTE CONTROLLER RENDERIZA LA PÁGINA DE INICIO DONDE PODEMOS CREAR UNA URL ACORTADA
        return new Response($twig->render('index.html.twig'));
    }
}