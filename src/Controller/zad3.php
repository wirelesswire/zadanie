<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
class zad3 extends AbstractController
{
    public function getUsers(){

        $encoders = [ new JsonEncoder()];
        $normalizers = [new ObjectNormalizer(),new ArrayDenormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $json =     file_get_contents("https://gorest.co.in/public/v2/users");
        $users = $serializer->deserialize($json,"App\Entity\user[]","json");
        return $users;
    }


    #[Route('/zad3', name: 'zad3')]
    public function strona(): Response
    {
        return $this->render("strona.html.twig");
    }




    #[Route('/zad3/render', name: 'render')]
    public function index(): Response
    {
        return $this->render("tabelka.html.twig",['users' => $this->getUsers(),]);
    }



}