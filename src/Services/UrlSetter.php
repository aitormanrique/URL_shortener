<?php


namespace App\Services;



use App\Entity\Urls;
use Doctrine\ORM\EntityManagerInterface;

class UrlSetter
{

    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function setUrl($longUrl, $shortUrl)
    {
        $em = $this->entityManager;

        $url = new Urls();
        $url->setOriginal($longUrl);
        $url->setShorter($shortUrl);


        $em->persist($url);
        $em->flush();
    }

}