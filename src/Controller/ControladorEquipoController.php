<?php

namespace App\Controller;

use App\Entity\Equipo;
use App\Repository\EquipoRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControladorEquipoController extends AbstractController
{
    #[Route('/controlador/equipo', name: 'controlador_equipo')]
    public function index(): Response
    {
        return $this->render('controlador_equipo/index.html.twig', [
            'controller_name' => 'ControladorEquipoController',
        ]);
    }

    #[Route('/controladorequipo/insertar', name: 'insertar_equipo')]
    public function insertarEquipo(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $e = new Equipo();
        $e->setnombre('Rayo Vallecano');
        $e->setSocios(50000);
        $e->setFundacion(1994);
        $e->setCiudad("Madriz");
        $e->setCodLiga(1);

        $e2 = new Equipo();
        $e2->setnombre('Rayo Vallecano2');
        $e2->setSocios(50000);
        $e2->setFundacion(1994);
        $e2->setCiudad("Madriz");
        $e2->setCodLiga(1);

        $e3 = new Equipo();
        $e3->setnombre('Rayo Vallecano2');
        $e3->setSocios(50000);
        $e3->setFundacion(1994);
        $e3->setCiudad("Madriz");
        $e3->setCodLiga(1);

        // Decimos a Doctrine que queremos guardar al jugador
        $entityManager->persist($e);
        $entityManager->persist($e2);
        $entityManager->persist($e3);

        // Ejecutamos la consulta de guardado.
        $entityManager->flush();

        return new Response('Id asignado al tercer equipo: ' . $e3->getId());
    }

    #[Route('/controladorequipo/buscar/{id}', name: 'buscar_equipo')]
    public function buscarequipo(ManagerRegistry $doctrine, int $id): Response
    {
        $e = $doctrine->getRepository(Equipo::class)->find($id);

        if (!$e){
            throw $this->createNotFoundException(
                'No hay ningún equipo con el id: ' . $id
            );
        }
        // return new Response('El jugador buscado es ' . $jugador->getnombre() .' ' . $jugador->getapellidos());
        return new Response('El equipo buscado es ' . $e->getnombre());
    }



    #[Route('/controladorequipo/actualizar/{id}', name: 'actualizar_equipo')]
    public function actualizarequipo(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $e = $doctrine->getRepository(Equipo::class)->find($id);

        if (!$e){
            throw $this->createNotFoundException(
                'No hay ningún Equipo con el id: '.$id
            );
        }
        $e->setnombre('Rayo Murciano');
        $e->setSocios(1);
        $e->setFundacion(2022);
        $e->setCiudad("Teruel");
        $e->setCodLiga(2);

        $entityManager->flush();
          return new Response('El nombre se ha actualizado a: ' . $e->getnombre());
    }

    #[Route('/controladorequipo/borrar/{id}', name: 'borrar_equipo')]
    public function borrarequipo(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $e = $doctrine->getRepository(Equipo::class)->find($id);

        if (!$e){
            throw $this->createNotFoundException(
                'No hay ningún equipo con el id: '.$id
            );
        }
        $entityManager->remove($e);
        $entityManager->flush();
        
        return new Response('El equipo se ha borrado correctamente');
    }


}