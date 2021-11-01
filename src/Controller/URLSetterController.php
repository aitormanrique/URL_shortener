<?php


namespace App\Controller;


use App\Services\UrlSetter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class URLSetterController extends AbstractController
{

    /**
     * @var UrlSetter
     */
    private $setter;

    public function __construct(UrlSetter $setter)
    {
        $this->setter = $setter;
    }
    public function __invoke(Request $request)
    {
        //RECOGEMOS LOS PARÁMETROS Y SETEAMOS LA URL ORIGINAL Y LA ACORTADA
        $longUrl = $request->request->get('longUrl');
        $shortUrl = $request->request->get('shortUrl');
        if ($longUrl && $shortUrl) {
            $this->setter->setUrl($longUrl, $shortUrl);
        }

        return $this->json('ok');
    }
}