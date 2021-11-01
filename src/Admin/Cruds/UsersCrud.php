<?php


namespace App\Admin\Cruds;


use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UsersCrud extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $userRoleChoices = [
            'SuperAdmin' => 'ROLE_SUPER_ADMIN',
            'Administrador' => 'ROLE_ADMIN',
            'Usuario' => 'ROLE_USER',
        ];

        $fields[] = TextField::new('name', 'Usuario');
        $fields[] = TextField::new('password', 'Contraseña');
        $fields[] = EmailField::new('email', 'Email');
        $fields[] = ChoiceField::new('roles', 'Rol(es)')->setChoices($userRoleChoices)
            ->allowMultipleChoices(true);
        return $fields;
    }


}