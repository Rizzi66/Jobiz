<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use BcMath\Number;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use phpDocumentor\Reflection\Types\Boolean;

class JobCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Job::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextareaField::new('description')->setSortable(true),
            TextField::new('city'),
            TextField::new('country'),
            BooleanField::new('remoteAllowed'),
            NumberField::new('salaryMin'),
            NumberField::new('salaryMax'),
            DateTimeField::new('createdAt'),
            AssociationField::new('company')->autocomplete(),
            AssociationField::new('jobType')->autocomplete(),

        ];
    }
    
}
