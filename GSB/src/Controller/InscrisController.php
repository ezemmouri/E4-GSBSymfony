<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Inscris;
use Doctrine\Common\Persistence\ObjectManager;

class InscrisController extends AbstractController
{
    /**
     * @Route("/inscris", name="inscris")
     */
    public function index()
    {
        return $this->render('inscris/index.html.twig', [
            'controller_name' => 'InscrisController',
        ]);
    }
}
