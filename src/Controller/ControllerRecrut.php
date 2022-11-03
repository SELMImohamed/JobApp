<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ControllerRecrut extends AbstractController
{
    /**
     * @Route("/recrut", name="recruteur")
     */

    public function index(ManagerRegistry $doctrine): Response
    {

        $entreprises = $doctrine->getRepository(Entreprise::class)->findAll();


        return $this->render('app/recrut.html.twig', [
            'entreprises' => $entreprises,
        ]);
    }
}