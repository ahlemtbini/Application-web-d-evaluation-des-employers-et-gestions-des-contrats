<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cdd;
use App\Entity\Realisation;
use App\Entity\Responsable;
use App\Entity\ObjectifRe;
use App\Form\ObjectifType;
use App\Entity\RealisationCdd;
use App\Form\RealisationCddType;
use App\Entity\Sessions;
use App\Entity\Criteres;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Dompdf\Dompdf;
use Dompdf\Options;






class CddController extends AbstractController
{
  

    
    /**
     * @Route("/cdd/{id}", name="cddid")
     */
    public function index(string $id,Request $request): Response
    {
      $ObjectifRe=$this->getDoctrine()->getRepository(ObjectifRe::class)->findBy(array('id' =>$id));

    	 $cdd = $this->getDoctrine()->getRepository(cdd::class)->findAll();
       $nb_realisation=$request->request->get("nb_realisation");
    	 $realisation = $this->getDoctrine()->getRepository(Realisation::class)->findAll();
       $RealisationCdd = new RealisationCdd();
      $form = $this->createForm(RealisationCddType::class,$RealisationCdd);

          $form->handleRequest($request);
      if ($form->isSubmitted())
      {

        $entityManger = $this->getDoctrine()->getManager();

        
        $ObjectifRe[0]->setNbRealisation1($nb_realisation);
        $entityManger->persist($RealisationCdd);
        $entityManger->flush();

           return $this->redirectToRoute('cdd');
      }
        return $this->render('cdd/index.html.twig', [
            'cdd' => $cdd,
            'realisation'=>$realisation,
            'ObjectifRe'=>$ObjectifRe,
            'form'=>$form->createView(),
           
        ]);
    }

    
    /**
   * @Route("/cdd",name="cdd")
   */

public function cdd():Response

{
  $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
	$cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
	$realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
  $RealisationCdd=$this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
	$Sessions=$this->getDoctrine()->getRepository(Sessions::class)->findAll();

	return $this->render('cdd/lien.html.twig' ,[
		'cdd' => $cdd,
		'realisation'=>$realisation,
    'ObjectifRe'=>$ObjectifRe,
    'RealisationCdd'=>$RealisationCdd,
    'Sessions'=>$Sessions,

]);
}

/**
   * @Route("/cddobjectifs",name="cddobjectifs")
   */

  public function cddobjectifs():Response

  {
    $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
    $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
    $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
    $RealisationCdd=$this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
    $Sessions=$this->getDoctrine()->getRepository(Sessions::class)->findAll();
  
    return $this->render('cdd/objectifs.html.twig' ,[
      'cdd' => $cdd,
      'realisation'=>$realisation,
      'ObjectifRe'=>$ObjectifRe,
      'RealisationCdd'=>$RealisationCdd,
      'Sessions'=>$Sessions,
  
  ]);
  }

/**
        * @Route("/session/{id}", name="session")
        */
        public function valider(string $id, Request $request): Response
        {
          $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
          $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
          $RealisationCdd=$this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
          $criteres=$this->getDoctrine()->getRepository(criteres::class)->findAll();
          $responsable=$this->getDoctrine()->getRepository(Responsable::class)->findAll();

          $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
          $Sessions=$this->getDoctrine()->getRepository(Sessions::class)->findBy(array('id' =>$id));
          $entityManger = $this->getDoctrine()->getManager() ;
          return $this->render('cdd/session.html.twig' ,[
            'cdd' => $cdd,
            'RealisationCdd' => $RealisationCdd,
            'ObjectifRe' => $ObjectifRe,
            'Sessions' => $Sessions,
            'realisation'=>$realisation,
            'criteres'=>$criteres,
            'responsable'=>$responsable,
            ]);
         }
    /**
   * @Route("/cddvalidation",name="cddvalidation")
   */

  public function cddvalidation():Response

  {
    $RealisationCdd = $this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
    $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
    $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
    $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
    return $this->render('cdd/validation.html.twig' ,[
      'cdd' => $cdd,
      'realisation'=>$realisation,
      'ObjectifRe'=>$ObjectifRe,
      'RealisationCdd'=>$RealisationCdd,
  
  ]);

    
}

         /**
        * @Route("/imprimeevaluation/{id}", name="imprimeevaluation" , methods={"GET"})
        */
        public function imprimeevaluation(string $id,Request $request): Response
        {

            
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Century Gothic');
        $pdfOptions->set('isRemoteEnabled',true);      


        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
         $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
          $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
          $RealisationCdd=$this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
          $criteres=$this->getDoctrine()->getRepository(criteres::class)->findAll();
          $responsable=$this->getDoctrine()->getRepository(Responsable::class)->findAll();
          $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
          $Sessions=$this->getDoctrine()->getRepository(Sessions::class)->findBy(array('id' =>$id));
          $entityManger = $this->getDoctrine()->getManager() ;
         
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('cdd/imprime.html.twig' ,[
            'cdd' => $cdd,
            'RealisationCdd' => $RealisationCdd,
            'ObjectifRe' => $ObjectifRe,
            'Sessions' => $Sessions,
            'realisation'=>$realisation,
            'criteres'=>$criteres,
            'responsable'=>$responsable,

        ]);
        
        // Load HTML to Dompdf
        $dompdf->loadHtml($html);
        
        // (Optional) Setup the paper size and orientation 'portrait' or 'portrait'
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser (force download)
      return new Response($dompdf->stream());
    }


}
