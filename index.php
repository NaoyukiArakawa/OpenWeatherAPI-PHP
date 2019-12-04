<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Call Weather <i class="fa fa-apple" aria-hidden="true"></i></title>
    <link rel="stylesheet" type="text/css" href="/style/stylesheet.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> <!-- bootstrap NDS -->
</head>

<body>
    <?php
    //echo $_GET['city'];
    //isset function :  
    if (isset($_GET['city'])) {
        $city = $_GET["city"];
        $urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . $city . "&appid=fac9676aa8de6252977e1a8672e861e2" . "&units=metric");
        //echo $urlContents;

        $weatherArray = json_decode($urlContents, true);
        //var_dump($weatherArray);
        //echo $weatherArray;
        //print_r($weatherArray);
    }

    //$_GET['city']
    // if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') == TRUE) {
    //     echo 'You are using Internet Explorer.<br />';
    // } else {
    //     echo 'You are not Internet Explorer lover ;p';
    // }
    ?>

    <section class="container text-center p-5">
        <h1 class=""> TRY ME!</h1>
        <p>Please type the name of a city.<p>
                <form method=“get”　action="index.php" class="">
                    <input type=“text” name="city" placeholder=" London, Paris etc." style="border-radius:15px 15px 15px 15px;">
                    <td class="">
                        <button type=“submit” style=" border-radius:50%;">Send</button>
                        <button type=“reset” style="border-radius:50%;">Reset</button>
                    </td>

                    <h2 class="p-3">
                        <?php
                        $description = $weatherArray[weather][0][description];
                        $temparture = $weatherArray[main][temp];
                        $tempartureMin = $weatherArray[main][temp_min];
                        $tempartureMax = $weatherArray[main][temp_max];
                        $country = $weatherArray[sys][country];
                        echo "Weather in " . $city . ", " . $country;
                        ?>
                    </h2>

                    <p id="temparture">
                        <?php
                        echo $temparture . " °C";
                        ?>
                    </p>

                    <p id="description">
                        <?php
                        echo $description;
                        ?>
                    </p>

            </p>
    </section>
</body>

</html>