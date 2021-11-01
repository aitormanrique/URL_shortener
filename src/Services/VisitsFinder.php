<?php


namespace App\Services;


use App\Entity\Urls;

class VisitsFinder
{

    public function getLastHourVisits(Urls $url): ?int
    {
        return $url->lastHourVisits();
    }

    public function getLastDayVisits(Urls $url): ?int
    {
        return $url->lastDayVisits();
    }

    public function getLastWeekVisits(Urls $url): ?int
    {
        return $url->lastWeekVisits();
    }

}