<?php
namespace App\Controller;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class peselTester{

    #[Route('/peseltest', name: 'pesel')]
    function wynik():Response{

        $val =   $_POST["val"] ?? false;
        if(!$val){
            
            return new Response("podana została błędna wartość");
        }

        return new Response($this->isOk($val) );
    }



    static function isOk($text) 
    {
      


        if (strlen($text) != 11) {
            return  "podany numer nie jest poprawny";

        }
    
        $cyfrakontrolna = -1;
        $wagi = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);
        $suma = 0;
    
        for ($i = 0; $i < count($wagi); $i++) {
            $suma += intval($text[$i]) * $wagi[$i];
        }
    
        $reszta = 10 - $suma % 10;
        $cyfrakontrolna = ($reszta == 10) ? 0 : $reszta;
    
        if ($cyfrakontrolna == intval($text[10])) {
            return "podany numer  jest poprawny ";
        } else {
            return "podany numer nie jest poprawny";
        }
    }
}



?>