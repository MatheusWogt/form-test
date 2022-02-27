<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class LuckyController extends AbstractController
{
    /**
     * @Route("/homepage/{age}")
     */
    public function homepage(int $age): Response
    {
        if ($age > 8000) {
            return new Response(
                '<html><body>Isso está errado, não pode ser, mais de 8000!</body></html>'
            );
        }
        return new Response(
            '<html><body>A idade informada foi: ' . $age . '</body></html>'
        );
    }


    /**
     * @Route("fotolivro/{code}/{name}")
     * */
    public function fotoLivro(int $code, string $name ): Response
    {

        return $this->render('fotolivro.html.twig', [
            'code' => $code,
            'name' => $name
        ]);
    }
    
    
    /**
     * @Route("/lucky/number/{max}", name="app_lucky_number")
     */
    public function number(int $max): Response
    {
        $number = random_int(0, $max);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}