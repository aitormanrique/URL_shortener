<?php


namespace App\Services;


use App\Entity\Urls;
use App\Repository\UrlsRepository;

class UrlsFinder
{
    /**
     * @var UrlsRepository
     */
    private $repository;

    public function __construct(UrlsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getUrls()
    {
        $urls = $this->repository->findAll();
        $urlsDecoded = [];
        foreach ($urls as $url) {
            $urlsDecoded[$url->getId()] = $url->getOriginal();
        }

        return $urlsDecoded;
    }

    public function getUrlByLongOne($longUrl)
    {
        return $this->repository->findOneBy(['original' => $longUrl]);
    }

}