<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/plantillas')]
class PlantillasController extends AbstractController
{
    #[Route('', name: 'plantillas')]
    public function index(): Response
    {
        return $this->render('plantillas/index.html.twig', [
            'controller_name' => 'PlantillasController',
        ]);
    }

    #[Route('/positivo/{num}', name: 'positivo')]
    public function positivo($num): Response
    {
        return $this->render('plantillas/if.html.twig', array('numero'=> $num));
    }

    #[Route('/tabla', name: 'tabla')]
    public function tabla(){
		$filas = array(array('codigo'=> '1', 'nombre' =>'Sevilla' ),
						array('codigo'=> '2', 'nombre' =>'Madrid' ));
		
		return $this->render('plantillas/tabla.html.twig', array ( 'filas' => $filas));
	 }

     #[Route('/saludo/{nom}', name: 'saludo')]
     public function saludo($nom): Response
     {
         return $this->render('plantillas/saludo.html.twig', array('nombre'=> $nom));
     }

}