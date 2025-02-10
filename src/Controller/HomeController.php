<?php

namespace App\Controller;

use App\Entity\Vehicule;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomeController extends AbstractController{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Retrieve all vehicles from the database
        $vehicules = $entityManager->getRepository(Vehicule::class)->findAll();

        // Render the Twig template and pass the 'vehicules' variable
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'vehicules' => $vehicules,  // ✅ Pass the vehicules variable
        ]);
    }
}
