<?php


namespace App\Admin\Cruds;


use App\Entity\Urls;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class UrlCrud extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Urls::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        $actions =  parent::configureActions($actions);

        return $actions
            ->remove(Crud::PAGE_INDEX, Action::DELETE);

    }
}