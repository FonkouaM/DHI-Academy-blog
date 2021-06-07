<?php

namespace App\Controller;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiants;

class EtudiantsController extends AbstractController
{
    private $manager;

    public function __construct(ContainerInterface $container){
        $this->container = $container;
        $this->manager = $this->getDoctrine()->getManager();
    }
    /**
     * @Route("/etudiants/list", name="etudiants.list")
     */
    public function list(): Response
    {
        $etudiants = $this->manager->getRepository(Etudiants::class)->findAll();
        return $this->render('etudiants/list.html.twig', [
            'etudiants' => $etudiants,
        ]);
    }
}
