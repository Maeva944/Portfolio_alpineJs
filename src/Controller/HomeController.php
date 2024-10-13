<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(): Response
    {
        $home = [
            'name' => 'PortFolio de Maëva',
            'description' => 'Portfolio regroupant mes expériences et compétences à travers un site web dynamique',
        ];

        return $this->render('accueil.html.twig', [
            'home' => $home,
        ]);
    }
}