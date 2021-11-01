<?php


namespace App\Services;


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

    public function getUrlsEntity()
    {
        return $this->repository->findAll();
    }


    public function getUrlByLongOne($longUrl)
    {
        return $this->repository->findOneBy(['original' => $longUrl]);
    }

    public function getUrlByShortOne($shortUrl)
    {
        return $this->repository->findOneBy(['shorter' => $shortUrl]);
    }


}