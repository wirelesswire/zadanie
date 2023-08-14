<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class zad1
{
    #[Route('/zad1', name: 'zad1') ,Route('/' , name:"zad12")]
    function text()
    {
        echo "<pre>";
        $text = "testowy text ";
        $interpunkcja = [" ", "+", ",", ".", "-", "'", "\"", "&", "!", "?", ":", ";", "#", "~", "=", "/", "$", "£", "^", "(", ")", "_", "<", ">", "\n", "\r"];


        $text  =$this->wczytaj();
        echo "\nwejscie:\n" . $text;
        $slowa = [];
        foreach ($this->dziel($text, $interpunkcja) as $slowo) {
            $slowa[] = $this->rzadz(mb_str_split($slowo,1));
        }
        echo "\nwyjscie:\n" . $this->scal($slowa);
        $this->zapisz($this->scal($slowa));

        return new  Response("");
    }

    function dziel($text, $tabznakow)
    {
        $tab = [];
        $indexMin = 0;
        $indexMax = 1;

        foreach (mb_str_split($text,1) as  $char) {
            if (in_array($char, $tabznakow)) {
                if ($indexMin + 1 != $indexMax) {
                    $tab[] = mb_substr($text, $indexMin, $indexMax - $indexMin - 1, 'utf-8');
                }
                $tab[] = $char;
                $indexMin = $indexMax;
            }
            $indexMax++;
        }
        $tab[] = mb_substr($text, $indexMin, $indexMax - $indexMin - 1, 'utf-8');

        return $tab;
    }

    function rzadz($slowo)
    {
        for ($i = 1; $i < count($slowo) - 1; $i++) {
            $rand = rand(10, 100) % (count($slowo));
            $rand = $rand != 0 ? $rand : ($rand + 1) % (count($slowo) - 1);
            $rand = $rand != count($slowo) - 1 ? $rand : ($rand - 1) % (count($slowo) - 1);

            

            $tmp = $slowo[$rand];
            $slowo[$rand] = $slowo[$i];
            $slowo[$i] = $tmp;
        }

        return join( $slowo);
    }
    function scal($tab)
    {
        $str = "";
        foreach ($tab as $t) {
            $str .= $t;
        }

        return $str;
    }

    function wczytaj()
    {
        $nazwa = "wejscie.txt";
        $file = null;

        if (!file_exists($nazwa)) {

            echo "no file , creating .... \n done ";
            $file = fopen($nazwa, "w+");

            fwrite($file, "Lorem ipsum dolor, sit amet consectetur 
adipisicing elit. Similique quibusdam harum cupiditate 
suscipit tempore corrupti ut expedita aliquam quo recusandae. żźćęą€ó,.ęąasd//źąś");
        } else {
            echo "all done ";
        }
        if (filesize($nazwa) == 0) {
            unlink($nazwa);
            $this->wczytaj();
            return;
        }

        $file2 =  fopen($nazwa, "r+");
        return fread($file2, filesize($nazwa));
    }
    function zapisz($text)
    {
        $name = "wyjscie.txt";
        $file = fopen($name, "w+");
        fwrite($file, $text);
    }
}
