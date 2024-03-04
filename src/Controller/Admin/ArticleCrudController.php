<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('id')->onlyOnIndex(),
            TextField::new('Title'),

            SlugField::new('TitleSlug')->onlyOnForms()->setTargetFieldName('Title'),
            TextEditorField::new('Content')->hideOnIndex(),
            ImageField::new('Theimg')->setUploadDir('public/uploads/img/')->setBasePath('uploads/img/')->hideOnIndex()->setUploadedFileNamePattern('[slug]-[contenthash].[extension]'),
            DateTimeField::new('DateCreate'),
            # date de l'update cachée sur l'accueil
            DateTimeField::new('DateUpdate')->hideOnIndex(),
            BooleanField::new('IsPublished'),

        ];
    }
    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
