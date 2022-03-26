<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Cdd;
use App\Entity\Contrat;
use App\Form\ContratType;


class ContratController extends AbstractController
{
    /**
     * @Route("/contrat", name="contrat")
     */
    public function index(): Response
    {
    	$cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
    	$contrat = $this->getDoctrine()->getRepository(Contrat::class)->findAll();
        return $this->render('contrat/index.html.twig', [
        	 'cdd'=>$cdd,
        	 'contrat'=>$contrat,
                 
            
        ]);
    }




     /**
        * @Route("/approuver/{mtr}", name="approuver")
        */
        public function approuver(string $mtr, Request $request): Response
        {
       $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findBy(array('MTR' =>$mtr));
       $entityManger = $this->getDoctrine()->getManager() ;
       $contrat= new Contrat();
       $form = $this->createForm(ContratType::class,$contrat);
       $form->handleRequest( $request);

     if ($form->isSubmitted() )
       {
        $contrat->setMTR($cdd[0]->getMTR());
        $contrat->setCin($cdd[0]->getCin());
        $contrat->setNOMPRENOM($cdd[0]->getNOMPRENOM());
        $contrat->setGRADE($cdd[0]->getGRADE());
        $contrat->setAGENCE($cdd[0]->getAGENCE());
        $contrat->setFONC($cdd[0]->getFONC());
        $contrat->setDATENAIS($cdd[0]->getDATENAIS());
        $contrat->setNumsession($cdd[0]->getNumsession());

        $entityManger->persist($contrat);
        $entityManger->flush();
        return $this->redirectToRoute('rh'); 
          }


       
              
           return $this->render('contrat/affichage.html.twig' ,[ 
                'cdd'=> $cdd,
                'contrat'=> $contrat,
                 'form'=>$form->createView()

           ]);            
         }
         /**
        * @Route("/refuser/{mtr}", name="refuser")
        */
        public function refuser(string $mtr, Request $request): Response
        {
       $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findBy(array('MTR' =>$mtr));
       $cdd1=$this->getDoctrine()->getRepository(Cdd::class)->findAll();

       $entityManger = $this->getDoctrine()->getManager() ;
       
       $cdd[0]->setSession(0);

        $entityManger->flush();
       
           return $this->render('rh/index.html.twig' ,[ 
                'cdd'=> $cdd1,

           ]);            
         }

}
