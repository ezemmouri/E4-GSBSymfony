<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Entity\Inscription;
use App\Form\FormationFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FormationController extends AbstractController
{
    /**
     * @Route("/formation", name="formation_all")
     */
    public function index(ObjectManager $manager)
    {

        $repo = $this->getDoctrine()->getRepository(Formation::class);
        $formations = $repo->findAll();
        $user = $this->getUser();
        if($user->getVisiteur()){
            return $this->render('formation/visiteur.html.twig', [
                'formations' => $formations
            ]);
        }
        return $this->render('formation/index.html.twig', [
            'formations' => $formations
        ]);
    }

    /**
     * @Route("/formation/{id}/supprimer", name="formation_supprimer")
     */
    public function supprimer($id, ObjectManager $manager)
    {

        $repo = $this->getDoctrine()->getRepository(Formation::class);
        $inscriptionRep = $this->getDoctrine()->getRepository(Inscription::class);
        $formation = $repo->find($id);
        $inscription = $inscriptionRep->findByFormation($formation);
        if($inscription == null){
            $manager->remove($formation);
            $manager->flush();
        }
        return $this->redirectToRoute('formation_all');
    }

    /**
     *  @Route("/formation/ajouter", name="formation_ajouter")
     *  @Route("/formation/{id}/modifier", name="formation_modifier")
     */
    public function form($id = null , ObjectManager $manager,Request $request)
    {
        if($id != null){
            $formation = $this->getDoctrine()->getRepository(Formation::class)->find($id);
            $editMode = true;
        }
        else{
            $editMode = false;
            $formation = new Formation();
        }
        $form = $this->createForm(FormationFormType::class, $formation);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($formation);
            $manager->flush();

            return $this->redirectToRoute('formation_all');  
        }
        
       
        return $this->render('formation/form.html.twig',[
            'formationForm' => $form->createView() ,
            'editMode' => $editMode
        ]);
        
    }
}
