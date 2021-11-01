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

class ShortUrlController extends AbstractController
{

    /**
     * @var SessionInterface
     */
    private $session;
    /**
     * @var UrlsFinder
     */
    private $finder;
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(
        SessionInterface $session,
        UrlsFinder $finder,
        EntityManagerInterface $entityManager
)
    {
        $this->session = $session;
        $this->finder = $finder;
        $this->entityManager = $entityManager;
    }

    public function __invoke(
        Request $request,
        $value,
        Environment $twig
    )
    {
        if ($this->session->has('value')) {
            $redirectionValue = $this->session->get('value');

            // SI NO VENIMOS DE REDIRECCIÓN (RECARGA DE PÁGINA, POR EJEMPLO), BUSCAMOS LA ENTIDAD Y LE SUMAMOS IGUALMENTE UNA VISITA
            $isRedirect = $this->session->has('urlEntity');
            if (!$isRedirect) {
                $url = $this->finder->getUrlByShortOne($value);
                $visit = new Visitas();
                $visit->setVisitDate(new \DateTime('now', new \DateTimeZone('Europe/Madrid')));
                $url->addVisita($visit);
                $this->entityManager->persist($url);
                $this->entityManager->flush();
            }
            $this->session->remove('urlEntity');
            return new Response($twig->render('test.html.twig', [
                'value' => $redirectionValue
            ]));
        } else {
            return new Response($twig->render('notFoundTemplate.html.twig'));
        }
    }
}