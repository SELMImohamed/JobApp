<?php

namespace App\Controller;

use App\Entity\Entreprise;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CompanyController extends AbstractController
{
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

            return $this->redirectToRoute('recruteur');
        };

        return $this->render('app/company.html.twig', [
            'formCompany' => $form->createView()
        ]);
    }
}
