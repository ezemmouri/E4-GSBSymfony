<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\Inscription;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AcceuilController extends AbstractController
{
    /**
     * @Route("/acceuil", name="get_acceuil")
     * @Route("/",name="acceuil")
     */
    public function index(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $repo = $this->getDoctrine()->getRepository(Formation::class);
        $inscriptionRep = $this->getDoctrine()->getRepository(Inscription::class);
        $formations = $repo->findAll();
        $user = $this->getUser();
        if($user->getVisiteur()){
            
          
            if($request->request->get('_formation_id')!=null){
               
                $formationId = (int)$request->request->get('_formation_id');
                $formation = $repo->find($formationId);
                
                if($inscriptionRep->findOneBy(array('user'=>$user,'formation'=>$formation)) ==null){
                   
                    $inscription = new Inscription();
                    $inscription->setUser($user);
                    $inscription->setFormation($formation);
                    $inscription->setStatus('pending');
                    $manager->persist($inscription);
                    $manager->flush();

                }
                return $this->redirectToRoute('acceuil');
            }

           
            $user_formations = $this->getUser()->getFormations();
            return $this->render('formation/visiteur.html.twig', [
                'formations' => $formations,
                'user_formations'=>$user_formations
            ]);
        }
        if($request->request->get('_inscription_valider')!=null){
            $value = $request->request->get('_inscription_valider');
            $array = explode('-',$value);
            $status =  $array[0];
            $id = (int)$array[1];
            $inscription = $inscriptionRep->find($id);
            $inscription->setStatus($status);
            $manager->persist($inscription);
            $manager->flush();
            return $this->redirectToRoute('acceuil');
        }

        return $this->render('formation/inscriptions.html.twig', [
            'inscriptions' => $inscriptionRep->findAll()
        ]);
    }
}
