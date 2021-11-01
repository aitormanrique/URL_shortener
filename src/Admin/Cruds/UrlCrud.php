<?php


namespace App\Admin\Cruds;


use App\Entity\Urls;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UrlCrud extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Urls::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields[] = TextField::new('original', 'Original');
        $fields[] = TextField::new('shorter', 'Acortada');
        $fields[] = IntegerField::new('countVisitasTotales', 'Visitas totales')->onlyOnIndex();

        return $fields;
    }


    public function configureActions(Actions $actions): Actions
    {
        $actions =  parent::configureActions($actions);

        return $actions
            ->remove(Crud::PAGE_INDEX, Action::DELETE);

    }
}