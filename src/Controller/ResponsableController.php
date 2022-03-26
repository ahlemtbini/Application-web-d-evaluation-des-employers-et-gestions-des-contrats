<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Cdd;
use App\Entity\Criteres;
use App\Entity\Realisation;
use App\Entity\Responsable;
use App\Entity\ObjectifRe;
use App\Form\ObjectifType;
use App\Entity\RealisationCdd;
use App\Entity\Sessions;
use App\Form\SessionsType;
use App\Form\RealisationCddType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;





class ResponsableController extends AbstractController
{
   /**
     * @Route("/responsable", name="responsable")
     * @IsGranted("ROLE_RESPONSABLE")
     */
  public function responsable()
    {
        $cdd = $this->getDoctrine()->getRepository(Cdd::class)->findAll();
        $realisation = $this->getDoctrine()->getRepository(Realisation::class)->findAll();
        $responsable = $this->getDoctrine()->getRepository(Responsable::class)->findAll();
        $Sessions = $this->getDoctrine()->getRepository(Sessions::class)->findAll();

        
                return $this->render('responsable/index.html.twig', [
                'cdd'=>$cdd,
                'realisation'=>$realisation,
                'responsable'=>$responsable,
                'Sessions'=>$Sessions,
                
        ]);

    }

     /**
     * @Route("/createobjectif/{mtr}", name="create_objectif")
     * @IsGranted("ROLE_RESPONSABLE")
     */
    public function createobjectif(Request $request,string $mtr ):Response
    {
      $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findBy(array('MTR' =>$mtr));
      $responsable = $this->getDoctrine()->getRepository(Responsable::class)->findAll();
      $Sessions = $this->getDoctrine()->getRepository(Sessions::class)->findAll();
      $realisation = $this->getDoctrine()->getRepository(Realisation::class)->findAll();

      $ObjectifRe = new ObjectifRe();
      $form = $this->createForm(ObjectifType::class,$ObjectifRe);

          $form->handleRequest($request);
      if ($form->isSubmitted())
      {
        $entityManger = $this->getDoctrine()->getManager();
        $entityManger->persist($ObjectifRe);
        $entityManger->flush();
        $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();

        return $this->render('responsable/index.html.twig' ,[
      
          'cdd' => $cdd,
          'responsable'=>$responsable,
          'Sessions'=>$Sessions,
          'realisation'=>$realisation,
    
      ]);      }
      return $this->render('responsable/objectif.html.twig',[
        'form'=>$form->createView(),
        'cdd' => $cdd,
      ]);
    }


    /**
        * @Route("/valider/{id}", name="valider")
        */
        public function valider(string $id, Request $request): Response
        {
          $entityManger = $this->getDoctrine()->getManager() ;
          $RealisationCdd = $this->getDoctrine()->getRepository(RealisationCdd::class)->findBy($arrayName = array('id' => $id ));
          if(! $RealisationCdd)
          {
            
            }
 
            {
              $RealisationCdd[0]->setvalider(1);
              $entityManger->flush();
              return $this->redirectToRoute('validerrealisation');
             }
         }


        /**
        * @Route("/invalider/{id}", name="invalider")
        */
        public function invalider(string $id, Request $request): Response
        {
          $entityManger = $this->getDoctrine()->getManager() ;
          $RealisationCdd = $this->getDoctrine()->getRepository(RealisationCdd::class)->findBy($arrayName = array('id' => $id ));
          if(! $RealisationCdd)
          {
            
            }
 
            {
              $RealisationCdd[0]->setvalider(-1);
              $entityManger->flush();
              return $this->redirectToRoute('validerrealisation');
             }
         }

   /**
   * @Route("/lien/{mtr}",name="lien")
   * @IsGranted("ROLE_RESPONSABLE")
   */

public function lien(string $mtr):Response

{
	$cdd=$this->getDoctrine()->getRepository(Cdd::class)->findBy(array('MTR' =>$mtr));
	$realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
	return $this->render('responsable/lien.html.twig' ,[
		'cdd' => $cdd,
		'realisation'=>$realisation,

]);
}
/**
   * @Route("/objectifs",name="objectifs")
   * @IsGranted("ROLE_RESPONSABLE")
   */

  public function objectifs():Response

  {
    $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
    $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
    $responsable = $this->getDoctrine()->getRepository(Responsable::class)->findAll();
    $Sessions = $this->getDoctrine()->getRepository(Sessions::class)->findAll();
    return $this->render('responsable/objectifs.html.twig' ,[
      'cdd' => $cdd,
      'realisation'=>$realisation,
      'responsable'=>$responsable,
      'Sessions'=> $Sessions,
  
  ]);
  }
  /**
   * @Route("/validerrealisation",name="validerrealisation")
   * @IsGranted("ROLE_RESPONSABLE")
   */

  public function validerrealisation():Response

  {
    $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findAll();
    $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
    $responsable = $this->getDoctrine()->getRepository(Responsable::class)->findAll();
    $Sessions = $this->getDoctrine()->getRepository(Sessions::class)->findAll();
    return $this->render('responsable/valider.html.twig' ,[
      'cdd' => $cdd,
      'realisation'=>$realisation,
      'responsable'=>$responsable,
      'Sessions'=> $Sessions,
  
  ]);
  }
/**
  * @Route("aff/{mtr}", name="aff")
  * @IsGranted("ROLE_RESPONSABLE")
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
  
       if($fonc==10){
          return $this->redirectToRoute('a10',['mtr' => $mtr]);
           
      }
       if($fonc==9){
          return $this->redirectToRoute('a9',['mtr' => $mtr]);
           
      }
       if($fonc==11){
          return $this->redirectToRoute('a10',['mtr' => $mtr]);
           
      }
      if($fonc==12){
        return $this->redirectToRoute('a10',['mtr' => $mtr]);
         
    }
    
             

              
    
          }


  /**
   * @Route("/9/{mtr}",name="a9")
   * @IsGranted("ROLE_RESPONSABLE")
   */

public function afficher9(Request $request,string $mtr):Response

{
	$cdd=$this->getDoctrine()->getRepository(Cdd::class)->findBy(array('MTR' =>$mtr));
  $responsable = $this->getDoctrine()->getRepository(Responsable::class)->findAll();
  $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
  $Sessions = new Sessions();
  $form = $this->createForm(SessionsType::class,$Sessions);
  $form->handleRequest( $request);

  if ($form->isSubmitted() )
  {
    $Sessions->setDate(new \DateTime('now'));
    $data=json_decode($form->get('abcde')->getData());
    $Sessions->setRates( $data->rates);  
    $Sessions->setScore(($data->score)*20/108);

    $entityManger = $this->getDoctrine()->getManager();
    $entityManger->persist($Sessions);
    $entityManger->flush();
    foreach($Sessions->getRates() as $e)
    {
      $criters = new Criteres();
        $criters->setMTR($Sessions->getMTR());
        $criters->setResponsable($Sessions->getResponsable());
        $criters->setNumsession($Sessions->getNumsession());
        $criters->setIdCritere($e->name);
        $criters->setNote($e->value);
        $entityManger->persist($criters);
        $entityManger->flush();
    }

    return $this->redirectToRoute('responsable');
  }
  
  return $this->render('responsable/9.html.twig' ,[
    
    'realisation'=>$realisation,
    'cdd' => $cdd,
    'form'=>$form->createView(),
    'responsable'=>$responsable,
    'Sessions'=>$Sessions,

]);
	
}
     
/**
   * @Route("/10/{mtr}",name="a10")
   * @IsGranted("ROLE_RESPONSABLE")
   */

  public function afficher10(Request $request,string $mtr):Response

  {
    $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findBy(array('MTR' =>$mtr));
    $responsable = $this->getDoctrine()->getRepository(Responsable::class)->findAll();
    $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
    $Sessions = new Sessions();
    $form = $this->createForm(SessionsType::class,$Sessions);
    $form->handleRequest( $request);
  
    if ($form->isSubmitted() )
    {
      $Sessions->setDate(new \DateTime('now'));
      $data=json_decode($form->get('abcde')->getData());
      $Sessions->setRates( $data->rates);  
      $Sessions->setScore(($data->score)*20/108);
  
      $entityManger = $this->getDoctrine()->getManager();
      $entityManger->persist($Sessions);
      $entityManger->flush();
      foreach($Sessions->getRates() as $e)
      {
        $criters = new Criteres();
          $criters->setMTR($Sessions->getMTR());
          $criters->setResponsable($Sessions->getResponsable());
          $criters->setNumsession($Sessions->getNumsession());
          $criters->setIdCritere($e->name);
          $criters->setNote($e->value);
          $entityManger->persist($criters);
          $entityManger->flush();
      }
  
      return $this->redirectToRoute('responsable');

    }
    
    return $this->render('responsable/affichage.html.twig' ,[
      
      'realisation'=>$realisation,
      'cdd' => $cdd,
      'form'=>$form->createView(),
      'responsable'=>$responsable,
      'Sessions'=>$Sessions,
  
  ]);
    
  }
       
  
/**
   * @Route("/realisation/{mtr}",name="realisation")
   */

  public function realisation(string $mtr):Response

  {
    $RealisationCdd = $this->getDoctrine()->getRepository(RealisationCdd::class)->findAll();
    $ObjectifRe = $this->getDoctrine()->getRepository(ObjectifRe::class)->findAll();
    $cdd=$this->getDoctrine()->getRepository(Cdd::class)->findBy(array('MTR' =>$mtr));
    $realisation=$this->getDoctrine()->getRepository(Realisation::class)->findAll();
    return $this->render('responsable/realisation.html.twig' ,[
      'cdd' => $cdd,
      'realisation'=>$realisation,
      'ObjectifRe'=>$ObjectifRe,
      'RealisationCdd'=>$RealisationCdd,
  
  ]);

    
}
	
}