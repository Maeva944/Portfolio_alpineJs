<?php

namespace App\Controller;

use App\Entity\Competence;
use App\Entity\Realisation;
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
        $realisations = $this->entityManager->getRepository(Realisation::class)->findAll();

        // Rendu de la vue
        return $this->render('accueil.html.twig', [
            'realisations' => $realisations
        ]);
    }
}
