<?php
namespace App\Controller;

use App\Entity\Competence; 
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager) 
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'home')]
    public function index(): Response
    {
        // Récupérer toutes les compétences depuis la base de données
        $competences = $this->entityManager->getRepository(Competence::class)->findAll();

        // Passer les compétences à la vue
        return $this->render('accueil.html.twig', [
            'competences' => $competences,
        ]);
    }
}