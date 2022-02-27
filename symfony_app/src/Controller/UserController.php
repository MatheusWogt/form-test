<?php
namespace App\Controller;
header('Access-Control-Allow-Origin: *');


use App\Entity\UsersSystemMemorar;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class UserController extends AbstractController
{

    /**
     * @Route("/users", methods={"GET"})
     */

    public function getUsers() {

        $users = $this->getDoctrine()
            ->getRepository(UsersSystemMemorar::class)
            ->findAll();

        $serializer = $this->get('serializer');
        $data = $serializer->serialize($users, 'json');

        return new Response ($data);
    }
    
    
    
    /**
     * @Route("/users", methods={"POST"})
     */

    public function postUsers(Request $request): Response 
    {

        $user = new UsersSystemMemorar();
        $user ->setName($request->get('name'));
        $user ->setPhone($request->get('phone'));
        $user ->setBirthDate(new \Datetime($request->get('birthDate')));
        $user ->setEmail($request->get('email'));
        $user ->setPassword($request->get('password'));
        $user ->setCpf($request->get('cpf'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();

        return new Response ('Inserido com sucesso!');
    }

    
}

?>