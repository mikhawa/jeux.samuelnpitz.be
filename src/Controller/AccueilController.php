<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
# Entité Article
use App\Entity\Article;
# Interface de notre ORM
use Doctrine\ORM\EntityManagerInterface;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        # Récupération de la table Article quand ils sont publiés par date de création ascendante
        $articleRepository = $entityManager->getRepository(Article::class)->findBy(['IsPublished' => true], ['DateCreate' => 'ASC']);

        return $this->render('accueil/index.html.twig', [
            'articles' => $articleRepository,
        ]);
    }
}
