<?php


namespace App\Controller;


use App\Entity\Urls;
use App\Entity\Visitas;
use App\Services\UrlsFinder;
use Doctrine\ORM\EntityManagerInterface;
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
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(
        UrlsFinder $finder,
        EntityManagerInterface $entityManager
    )
    {
        $this->finder = $finder;
        $this->entityManager = $entityManager;
    }

    public function index(
        Request $request,
        $value,
        Environment $twig,
        SessionInterface $session
    ): Response
    {
        //ANTES DE LA REDIRECCIÓN, AÑADIMOS UNA VISITA A LA PÁGINA Y SETEAMOS EN LA SESSION EL O LOS VALORES QUE NECESITAMOS PARA RENDERIZARLA
        $session->set('value', $value);
        $url = $this->finder->getUrlByLongOne($request->getPathInfo());
        $visit = new Visitas();
        $visit->setVisitDate(new \DateTime('now', new \DateTimeZone('Europe/Madrid')));
        $url->addVisita($visit);
        $this->entityManager->persist($url);
        $this->entityManager->flush();
        if ($url instanceof Urls) {
            // SETEAMOS EN SESSION TAMBIÉN LA ENTIDAD PARA INDICAR MÁS ADELANTE QUE VENIMOS DE UNA REDIRECCIÓN
            $session->set('urlEntity', $url);
            return $this->redirectToRoute('short_url', ['value' => $url->getShorter()]);

        } else {
            return new Response($twig->render('notFoundTemplate.html.twig'));
        }
    }

}