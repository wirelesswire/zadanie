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
        $json =     file_get_contents("https://gorest.co.in/public/v2/users?page=1&per_page=25 ");
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
        $stringToMatch = $_POST['str'] ??null;
        // var_dump(($stringToMatch));
        if($stringToMatch   == null  || $stringToMatch == "" || $stringToMatch == "undefined"){
        return $this->render("tabelka.html.twig",['users' => $this->getUsers() ,]);

        }
        return $this->render("tabelka.html.twig",['users' =>$this->szukaj( $this->getUsers() ,$stringToMatch ) ,]);

    }
    public function szukaj($users , $stringToMatch ){
        $usersthatmatch = [];

        foreach($users as $user ){
            if(str_contains( $user->getId().$user->getName().$user->getEmail().$user->getGender().$user->getStatus()  ,$stringToMatch  )){
                $usersthatmatch[] = $user;
            }
        }

        



        return $usersthatmatch;
    }




}