<?php


namespace App\Controller;


use App\Entity\Urls;
use App\Services\UrlsFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Environment;

class TestUrlsController extends AbstractController
{
    /**
     * @var UrlsFinder
     */
    private $finder;

    public function __construct(UrlsFinder $finder)
    {
        $this->finder = $finder;
    }

    public function index(
        Request $request,
        $value,
        Environment $twig,
        SessionInterface $session
    ): Response
    {
        $session->set('value', $value);
        $url = $this->finder->getUrlByLongOne($request->getPathInfo());

        if ($url instanceof Urls) {
            return $this->redirectToRoute('short_url', ['value' => $url->getShorter()]);

        } else {
            return new Response($twig->render('notFoundTemplate.html.twig'));
        }
    }

}