<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;

class AppController extends AbstractController
{
    /**
     * @Route("/", name = "home")
     */

    public function home()
    {
        return $this->render('app/home.html.twig');
    }

    /**
     * @Route("/recrut", name = "recruteur")
     */

    public function recrut()
    {
        return $this->render('app/recrut.html.twig');
    }

    /**
     * @Route("/profil", name = "profil")
     */

    public function profil()
    {
        return $this->render('app/profil.html.twig');
    }

    /**
     * @Route("/company/create", name = "create_company")
     */

    public function createCompany(Request $request, ManagerRegistry $managerRegistry)
    {
        $company = new Entreprise();

        $form = $this->createFormBuilder($company)
            ->add('nomEntreprise')
            ->add('secteur')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $managerRegistry->getManager();
            $em->persist($company);
            $em->flush();

            return $this->redirectToRoute('home');
        };

        return $this->render('app/company.html.twig', [
            'formCompany' => $form->createView()
        ]);
    }
}
