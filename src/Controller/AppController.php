<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AppController extends AbstractController
{
    /**
     * @Route("/", name = "home")
     */

    public function home(){
        return $this->render('app/home.html.twig');
    }

    /**
     * @Route("/recrut", name = "recruteur")
     */

    public function recrut(){
        return $this->render('app/recrut.html.twig');
    }

    /**
     * @Route("/profil", name = "profil")
     */

    public function profil(){
        return $this->render('app/profil.html.twig');
    }

    /**
     * @Route("/test", name = "test")
     */

    public function test(){
        return $this->render('app/test.html.twig');
    }
}