<?php
namespace App\Controller;

use App\Entity\Jugador;
use App\Entity\Equipo;
use App\Repository\JugadorRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControladorJugadores extends AbstractController
{
    #[Route('/controladorjugador/insertar', name: 'insertar_jugador')]
    public function insertarjugador(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $jugador = new Jugador();
        $jugador->setnombre('Carlos');
        $jugador->setApellido('Lesmes');
        $jugador->setedad(19);
        $jugador->setequipo(1);
        //$equipo = $jugador->getequipo();
        //$equipo->getSocios();

        // Decimos a Doctrine que queremos guardar al jugador
        $entityManager->persist($jugador);

        // Ejecutamos la consulta de guardado.
        $entityManager->flush();

        return new Response('Id asignado al jugador: ' . $jugador->getId());
    }

    #[Route('/controladorjugador/buscar/{id}', name: 'buscar_jugador')]
    public function buscarjugador(ManagerRegistry $doctrine, int $id): Response
    {
        $jugador = $doctrine->getRepository(Jugador::class)->find($id);

        if (!$jugador){
            throw $this->createNotFoundException(
                'No hay ningún jugador con el id: ' . $id
            );
        }
        // return new Response('El jugador buscado es ' . $jugador->getnombre() .' ' . $jugador->getapellidos());
        return new Response('El jugador buscado es ' . $jugador->getnombre());
    }

    #[Route('/controladorjugador/buscar2/{id}', name: 'buscar2_jugador')]
    public function buscardosjugador(JugadorRepository $jugadorRepository, int $id): Response
    {
        $jugador = $jugadorRepository->find($id);

        if (!$jugador){
            throw $this->createNotFoundException(
                'No hay ningún jugador con el id: ' . $id
            );
        }
        
        //return new Response('El jugador buscado es ' . $jugador->getnombre() .' ' . $jugador->getapellidos());
        return new Response('El jugador buscado es ' . $jugador->getnombre());
    }



    #[Route('/controladorjugador/actualizar/{id}', name: 'actualizar_jugador')]
    public function actualizarjugador(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $jugador = $doctrine->getRepository(Jugador::class)->find($id);

        if (!$jugador){
            throw $this->createNotFoundException(
                'No hay ningún jugador con el id: '.$id
            );
        }
        $jugador->setnombre('Antonio');
        $entityManager->flush();
          return new Response('El nombre se ha actualizado a: ' . $jugador->getnombre());
    }

    #[Route('/controladorjugador/borrar/{id}', name: 'borrar_jugador')]
    public function borrarjugador(ManagerRegistry $doctrine, int $id): Response
    {
        $entityManager = $doctrine->getManager();
        $jugador = $doctrine->getRepository(Jugador::class)->find($id);

        if (!$jugador){
            throw $this->createNotFoundException(
                'No hay ningún jugador con el id: '.$id
            );
        }
        $entityManager->remove($jugador);
        $entityManager->flush();
        
        return new Response('El jugador se ha borrado correctamente');
    }


}
