<?php
namespace App\Controller\Api;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class zad2{
    #[Route('/zad2', name: 'zad2')]

    function pesel():Response
    { 
        ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


</head>

<body>

    <input type="number" onkeyup="check(this.value)">
    <span id="answer"> wprowadz numer </span>



    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>




        function check(val) {
            $.ajax({
                type: "POST",
                url: "/peseltest",
                data: "val=" + val,
                success: (res) => {
                    // console.log(res)
                    $('#answer').html(res);

                }

            })
      

        }



    </script>
</body>

</html>

<?php
    // );}
    return new Response();
}
}

?>


