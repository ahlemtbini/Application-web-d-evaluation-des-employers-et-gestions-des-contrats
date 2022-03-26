<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cdd;
use App\Entity\Contrat;
use App\Entity\Sessions;
use App\Entity\Realisation;
use App\Entity\Responsable;
use App\Entity\ObjectifRe;
use App\Form\ObjectifType;
use App\Entity\RealisationCdd;
use App\Form\RealisationCddType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Dompdf\Dompdf;
use Dompdf\Options;





class ChargeController extends AbstractController
{


     /**
     * @Route("/charge", name="charge")
     * @IsGranted("ROLE_CHARGE")
     */
  public function charge()
    {
        $cdd = $this->getDoctrine()->getRepository(Cdd::class)->findAll();
        

        
                return $this->render('charge/index.html.twig', [
                'cdd'=>$cdd,
                
        ]);
    }

    /**
     * @Route("/contrat/{id}", name="contratid")
     * @IsGranted("ROLE_CHARGE")
     */
  public function contrat(String $id)
  {
      $cdd = $this->getDoctrine()->getRepository(Cdd::class)->findAll();
      $Sessions = $this->getDoctrine()->getRepository(Sessions::class)->findAll();

      $contrat = $this->getDoctrine()->getRepository(Contrat::class)->findBy(array('id' =>$id));


      
              return $this->render('charge/contrat.html.twig', [
              'cdd'=>$cdd,
              'contrat'=>$contrat,
              'Sessions'=>$Sessions,
              
      ]);
  }
  /**
   * @Route("/contrats",name="contrats")
   */

  public function contrats():Response

  {
    $contrat=$this->getDoctrine()->getRepository(Contrat::class)->findAll();
    return $this->render('charge/contrats.html.twig' ,[
      'contrat' => $contrat,
  
  ]);

    
}



     /**
        * @Route("/activer/{mtr}", name="activersession")
        * @IsGranted("ROLE_CHARGE")
        */
       public function activer(string $mtr, Request $request): Response
       {
         $entityManger = $this->getDoctrine()->getManager() ;
         $numsession=$request->request->get("numsession");
         $cdd = $this->getDoctrine()->getRepository(Cdd::class)->findBy($arrayName = array('MTR' => $mtr ));
         if(!$cdd)
         {
           throw $this->createNotFoundExeption(
             'pas d employe avec la matricule'.$mtr
           );
           }

           {
             $cdd[0]->setSession(1);
             
              $cdd[0]->setNumsession($numsession);

             $entityManger->flush();
             return $this->redirectToRoute('charge');
            }
        }

        /**
        * @Route("/cloturer/{mtr}", name="cloturersession")
        * @IsGranted("ROLE_CHARGE")
        */
       public function cloturer(string $mtr, Request $request): Response
       {
         $entityManger = $this->getDoctrine()->getManager() ;
         $cdd = $this->getDoctrine()->getRepository(Cdd::class)->findBy($arrayName = array('MTR' => $mtr ));
         if(!$cdd)
         {
           throw $this->createNotFoundExeption(
             'pas d employe avec la matricule'.$mtr
           );
           }

           {
             $cdd[0]->setSession(0);
             $entityManger->flush();
             return $this->redirectToRoute('charge');
            }
        }

   /**
        * @Route("/imprimecontrat/{id}", name="imprimecontrat" , methods={"GET"})
        */
        public function imprimecontrat(string $id,Request $request): Response
        {

            
        // Configure Dompdf according to your needs
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Century Gothic');
        $pdfOptions->set('isRemoteEnabled',true);      
        
        // Instantiate Dompdf with our options
        $dompdf = new Dompdf($pdfOptions);
        $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
        $contrat=$this->getDoctrine()->getRepository(Contrat::class)->findBy(array('id' =>$id));
        $Sessions = $this->getDoctrine()->getRepository(Sessions::class)->findAll();
        $entityManger = $this->getDoctrine()->getManager() ;
        
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('charge/imprime.html.twig' ,[
            'cdd' => $cdd,
            'contrat'=>$contrat,
            'Sessions'=>$Sessions,

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