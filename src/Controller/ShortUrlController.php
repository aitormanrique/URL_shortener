<?php


namespace App\Controller;


use App\Entity\Urls;
use App\Services\UrlsFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Twig\Environment;

class ShortUrlController extends AbstractController
{

    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function __invoke(
        Request $request,
        $value,
        Environment $twig
    )
    {
        if ($this->session->has('value')) {
            $value = $this->session->get('value');
            $this->session->remove('value');
            return new Response($twig->render('test.html.twig', [
                'value' => $value
            ]));
        }
    }
}