<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// Especificar ruta a nivel de clase
#[Route('/base')]
class RutasController extends AbstractController
{
    #[Route('/rutas', name: 'rutas')]
    public function index(): Response
    {
        return $this->render('rutas/index.html.twig', ['controller_name' => 'RutasController']);
    }

    #[Route('/rutas/{hola}', name: 'hola')]
    public function hola($hola)
    {
        return new Response($hola);
    }

    // Paso de varios parámetros
    #[Route("/producto/{num1}/{num2}", name: "producto")]
    public function producto($num1, $num2)
    {
        $producto = $num1 * $num2;
        return new Response($producto);
    }

    //Valores por defecto a nivel de método
    #[Route("/defecto1/{num}", name: "defecto1")]
    public function defecto1($num = 3)
    {
        return new Response($num);
    }

    //Valores por defecto a nivel de ruta
    #[Route("/defecto2/{num?4}", name: "defecto2")]
    public function defecto2($num)
    {
        return new Response($num);
    }

    //Redirección de una ruta
    #[Route("/cuadrado/{num}", name: "cuadrado")]
    public function cuadrado($num)
    {
        return $this->redirectToRoute('producto', array('num1' => $num, 'num2' => $num));
    }

    //Restricciones en un ruta

    //Valores regulares
    // https://www.w3schools.com/php/php_regex.asp
    // https://stackoverflow.com/questions/6475036/regex-to-match-non-integers
    // https://regex101.com/r/8zJwCy/1

        //Restricción por valores permitidos
    #[Route("/doble/{num}", name: "doble", requirements: ["num" => "5|7"])]
    public function doble($num)
    {
        return new Response(2 * $num);
    }

    //Restricción por tipo de dato, solo números enteros positivos
    #[Route('/tipodato/{dato}', name: "valores_1", requirements: ["dato" => "\d+"])]
    public function tipo_dato_1($dato)
    {
        return new Response("El dato es un número: " . $dato);
    }

    //Restricción por tipo de dato, cadena sin caracteres numéricos y guiones
    #[Route('/tipodato/{dato}', name: "valores_2", requirements: ["dato" => "[^-0-9\/]+|[0-9]+(?=-)|^-$|-{2,}]"])]
    public function tipo_dato_3($dato)
    {
        return new Response("El dato es una cadena sin números: " . $dato);
    }

    //Restricción por tipo de dato, cadenas cualquiera
    #[Route('/tipodato/{dato}', name: "valores_3")]
    public function tipo_dato_2($dato)
    {
        return new Response("El dato es una cadena cualquiera: " . $dato);
    }

    //Restricciones HTTP
    
    #[Route('/metodo/', name: 'metodo_post', methods: ["POST"])]
    public function metodo_post()
    {
        return new Response("Accedo mediante POST");
    }

    //Retricción método GET
    #[Route('/metodo/', name: 'metodo_get',  methods: ["GET"])]
    public function metodo_get()
    {
        return new Response("Accedo mediante GET");
    }

//  Conversión de URL
// Tomemos como ejemplo las siguientes URLs: 
//    http://localhost/routing-example/web/app_dev.php/products
//    http://localhost/routing-example/web/app_dev.php/products/
// Si queremos que la segunda rediriga a la primera podemos hacer una transformación para eliminar la barra final
// Suele ser conveniente hacer esto para todas las URLs.
// Definimos una función que elimina dicha barra y nos rediriga a la ruta sin la barra.

#[Route("/{url}", requirements: ["url"=> ".*\/$" ])]
#[Method("GET")]

public function removeTrailingslashAction (Request $request) {
    $pathInfo = $request->getPathInfo();
    $requestUri = $request->getRequestUri();
    $url = str_replace($pathInfo, rtrim($pathinfo, '/'), $requestUri);
return $this->redirect ($url, 301);
}

// Generar URLs a partir de las rutas

// A partir del nombre de un ruta, queremos generar una url. Podemos hacerlo con generateURL()
// Podemos enviar parámetros a través de generateURL enviándolos a traves de un array
// generateURL('nombre_redirección', array('dato'=>valor))

#[Route("/numero/defecto1")]
public function doblarnum(){
    $url = $this->generateUrl('defecto1');
    return $this->redirect($url, 301) ;
}



}