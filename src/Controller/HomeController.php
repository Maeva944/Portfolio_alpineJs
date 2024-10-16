<?php

namespace App\Controller;

use App\Entity\Competence;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        // Pour le moment, nous n'avons plus de données à récupérer

        // Rendu de la vue
        return $this->render('accueil.html.twig', [
            // Pas de données à passer pour le moment
        ]);
    }
}
