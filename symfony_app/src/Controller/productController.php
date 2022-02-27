<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class productController extends AbstractController {
    /**
    * @Route("/product/{name}/{price}")
    */
    public function insertProduct(string $name, float $price):Response{

        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($product);
        $entityManager->flush();

        return new Response('ta funcionando patrão');


    }

    /**
    * @Route("/listAllProducts/{price}")
    */
    public function listAllProducts($price):Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        /* USADO PRA CONTAR QUANTOS PRODUTOS TEM */
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findAll();
        return new Response('contagem de produtos: ' . count($products));
        /* USADO PARA LISTAR OS PRODUTOS */
        $serializer = $this->get('serializer');
        $data = $serializer->serialize($products, 'json');
        return new Response($data);
        
        /* USADO PARA MOSTRAR OS PRODUTOS COM PREÇO ACIMA DE $PRICE POR ORDEM ASCENDENTE */
        $entityManager = $this->getDoctrine()->getManager();
        $query = $entityManager->createQuery(
            'SELECT p
            FROM App\Entity\Product p
            WHERE p.price > :price
            ORDER BY p.price ASC'
        )->setParameter('price', $price);

        $serializer = $this->get('serializer');
        $data = $serializer->serialize($query->getResult(), 'json');
        return new Response($data);


    }
}