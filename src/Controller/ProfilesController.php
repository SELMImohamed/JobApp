<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Profile;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;



class ProfilesController extends AbstractController
{
    /**
     * @Route("/profile/display", name = "profile")
     */

    public function profileDisplay(ManagerRegistry $doctrine): Response
    {
        $repository = $doctrine->getRepository(Profile::class)->findAll();

        return $this->render('app/profilepage.html.twig', [
            'profil' => $repository
        ]);
    }
}
