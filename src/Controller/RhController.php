<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cdd;
use App\Entity\Sessions;
use App\Entity\Rh;
use App\Entity\Criteres;
use App\Entity\Realisation;
use App\Entity\Responsable;
use App\Entity\ObjectifRe;
use App\Form\ObjectifType;
use App\Entity\RealisationCdd;
use App\Form\RealisationCddType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;


class RhController extends AbstractController
{
    /**
     * @Route("/rh", name="rh")
     * @IsGranted("ROLE_RH")
     */
    public function RH( Request $request): Response
    {
        $cdd = $this->getDoctrine()->getRepository(Cdd::class)->findAll();
         $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
          $RealisationCdd=$this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
          $criteres=$this->getDoctrine()->getRepository(criteres::class)->findAll();
          $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
          $Sessions=$this->getDoctrine()->getRepository(Sessions::class)->findAll();
          $id= $Sessions[0]->getId();

        
                return $this->render('rh/index.html.twig', [
                 'cdd' => $cdd,
            'RealisationCdd' => $RealisationCdd,
            'ObjectifRe' => $ObjectifRe,
            'Sessions' => $Sessions,
            'realisation'=>$realisation,
            'criteres'=>$criteres,
            

                
        ]);
    }
/*----------------------------------------------------------affichage de chart-------------------------------------*/

    /**
  * @Route("/rh/affichage/{mtr}", name="affichagerh")
  * @IsGranted("ROLE_RH")
  */

   public function affichage(Request $request,string $mtr ):Response
    {
      $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findBy(array('MTR' =>$mtr));
         $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
          $RealisationCdd=$this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
          $criteres=$this->getDoctrine()->getRepository(criteres::class)->findAll();
          $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
          $Sessions=$this->getDoctrine()->getRepository(Sessions::class)->findAll();
          $cdd1=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
          $mtr=$cdd[0]->getMTR();
          $id= $Sessions[0]->getId();
            $fonc=$cdd[0]->getFONC();
    
      
            return $this->redirectToRoute('10',['mtr' => $mtr]);
             
       

                
      
            }




  /**
  * @Route("/rh/affichage10/{mtr}", name="10")
  * @IsGranted("ROLE_RH")
  */

   public function affichage10(Request $request,string $mtr ):Response
    {
      $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findBy(array('MTR' =>$mtr));
         $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
          $RealisationCdd=$this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
          $criteres=$this->getDoctrine()->getRepository(criteres::class)->findAll();
          $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
          $Sessions=$this->getDoctrine()->getRepository(Sessions::class)->findAll();
          $id= $Sessions[0]->getId();

        
                return $this->render('rh/affichage/10.html.twig', [
                 'cdd' => $cdd,
            'RealisationCdd' => $RealisationCdd,
            'ObjectifRe' => $ObjectifRe,
            'Sessions' => $Sessions,
            'realisation'=>$realisation,
            'criteres'=>$criteres,
            

                
        ]);
               

                
      
            }







/*--------------------------------------------------------criteres---------------------------------------*/


        /**
        * @Route("/rh/affichage/criteres/{id}", name="rhCriteres")
        */
        public function crite(string $id, Request $request): Response
        {
          $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
          $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
          $RealisationCdd=$this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
          $criteres=$this->getDoctrine()->getRepository(criteres::class)->findAll();

          $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
          $Sessions=$this->getDoctrine()->getRepository(Sessions::class)->findBy(array('id' =>$id));
           $entityManger = $this->getDoctrine()->getManager() ;
          foreach($cdd as $e)
             {
              if ($e->getMTR()==$Sessions[0]->getMTR())
                {$fonc=$e->getFONC();}
           }
         
           if($fonc==10){
            return $this->redirectToRoute('c10',['id' => $id]);
             
        }
         if($fonc==9){
            return $this->redirectToRoute('c9',['id' => $id]);
             
        }
         if($fonc==12){
            return $this->redirectToRoute('c10',['id' => $id]);
             
        }
    
        if ($fonc==11) {
             return $this->redirectToRoute('c10',['id' => $id]);
         }
      
         }





  /**
  * @Route("/rh/crite10/{id}", name="c10")
  * @IsGranted("ROLE_RH")
  */

   public function crite10(string $id,Request $request ):Response
    {
      $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
      
         $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
          $RealisationCdd=$this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
          $criteres=$this->getDoctrine()->getRepository(criteres::class)->findAll();
          $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
          $Sessions=$this->getDoctrine()->getRepository(Sessions::class)->findBy(array('id'=>$id));
          $responsable=$this->getDoctrine()->getRepository(Responsable::class)->findAll();
         

        
                return $this->render('rh/crite.html.twig', [
                 'cdd' => $cdd,
            'RealisationCdd' => $RealisationCdd,
            'ObjectifRe' => $ObjectifRe,
            'responsable'=>$responsable,
            'Sessions' => $Sessions,
            'realisation'=>$realisation,
            'criteres'=>$criteres,
            

                
        ]);
               

                
      
            }




  /**
  * @Route("/rh/crite9/{id}", name="c9")
  * @IsGranted("ROLE_RH")
  */

   public function crite9(string $id,Request $request ):Response
    {
      $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
      
         $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
          $RealisationCdd=$this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
          $criteres=$this->getDoctrine()->getRepository(criteres::class)->findAll();
          $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
          $Sessions=$this->getDoctrine()->getRepository(Sessions::class)->findBy(array('id'=>$id));
          $responsable=$this->getDoctrine()->getRepository(Responsable::class)->findAll();

         

        
                return $this->render('rh/c9.html.twig', [
                 'cdd' => $cdd,
            'RealisationCdd' => $RealisationCdd,
            'ObjectifRe' => $ObjectifRe,
            'Sessions' => $Sessions,
            'realisation'=>$realisation,
            'responsable'=>$responsable,
            'criteres'=>$criteres,
            

                
        ]);
               

                
      
            }





        /**
        * @Route("/imprime/{id}", name="imprime" , methods={"GET"})
        * @IsGranted("ROLE_RH")
        */
        public function imprime(string $id,Request $request): Response
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

          $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
          $Sessions=$this->getDoctrine()->getRepository(Sessions::class)->findBy(array('id' =>$id));
          $responsable=$this->getDoctrine()->getRepository(Responsable::class)->findAll();

          $entityManger = $this->getDoctrine()->getManager() ;
         
        
        // Retrieve the HTML generated in our twig file
        $html = $this->renderView('rh/imprime.html.twig' ,[
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
