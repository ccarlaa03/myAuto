
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My AuTo</title>
    <link rel="icon" type="images/icon"
        href="https://previews.123rf.com/images/tatianasun/tatianasun1705/tatianasun170500025/77826881-auto-mechanic-car-service-repair-and-maintenance-work-icons-set-isolated-vector-illustration.jpg" />
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/global.css">
    <style type="text/css">
        @media screen and (max-width: 39.9375em) {}

        @media screen and (min-width: 40em) {}

        @media screen and (min-width: 40em) and (max-width: 63.9375em) {}

        @media screen and (min-width: 64em) {}

        @media screen and (min-width: 64em) and (max-width: 74.9375em) {}

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100vw;
        }

        section {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            margin: 20px;
            border: 1px solid #ccc;
        }

        form {
            border: 3px solid #f1f1f1;
        }

     
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }


        input[type="text"],
        input[type="email"] {
            font-size: 16px;
            width: 300px;
            height: 40px;
        }

        input[type="date"] {
            font-size: 16px;
            width: 300px;
            height: 40px;
        }

        h1 {
            text-align: center;
            color: firebrick;
        }

    </style>
</head>

<body>
<?php
  session_start();
  include('headerlogged.php');
 

$db = mysqli_connect("localhost:3307", "root", "");
mysqli_select_db($db, "my_auto");
$nume = $rol = $parola = $email = $adresa = $telefon = $sex = "";

if ((isset($_POST["nume"])) && (isset($_POST["email"])) && (isset($_POST["telefon"])) && (isset($_POST["gender"])) && (isset($_POST['address']))) {

    $nume = $_POST["nume"];
    $email = $_POST["email"];
    $telefon = $_POST["telefon"];
    $rol = "Utilizator";
    $data_inregistrare = date("d/m/Y");
    $sex = $_POST["gender"];
    $adresa = $_POST['address'];


    $sql = ("INSERT INTO urilizatori (nume,email,telefon,rol,data_inregistrare,sex,adresa) VALUES ('$nume','$email','$telefon','$rol', ' $data_inregistrare','$sex','$adresa')");
    $_POST = array();

    $results = mysqli_query($db, $sql);
    if (!$results) {
        die('Invalid querry:' . mysqli_error($db));
    } else {
        echo "Inregistrarea a fost adaugata.";
    }
}

?>

    <center>

    <h2 style="color: firebrick;">Adăugă utilizatori noi</h2><br>

        <form method="POST" action="adauga_util.php">

            <label for="nume">Nume:</label>
            <input type="text" name="nume" id="nume" size="30">
            <label for="nume">Sex:</label>
            <input type="text" name="gender" id="gender" size="30">
            <label for="email">E-mail:</label>
            <input type="email" name="email" id="email" size="30">
            <label for="telefon">Nr. telefon:</label>
            <input type="text" name="telefon" id="telefon" size="30">
            <label for="address">Adresa:</label>
            <input type="text" for="address" name="address" id="address" size="30">

            <br>
            <button type="submit" class="btn">Adaugă personă</button>
        </form>
    </center>


    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>