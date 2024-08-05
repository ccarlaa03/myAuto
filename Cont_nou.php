<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My AuTo</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="icon" type="images/icon"
        href="https://previews.123rf.com/images/tatianasun/tatianasun1705/tatianasun170500025/77826881-auto-mechanic-car-service-repair-and-maintenance-work-icons-set-isolated-vector-illustration.jpg" />
    <link rel="stylesheet" href="./css/global.css">
</head>
<style>
    @media screen and (max-width: 39.9375em) {}

    @media screen and (min-width: 40em) {}

    @media screen and (min-width: 40em) and (max-width: 63.9375em) {}

    @media screen and (min-width: 64em) {}

    @media screen and (min-width: 64em) and (max-width: 74.9375em) {}

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    form {
        border: 3px solid #f1f1f1;
    }

    .container {
        padding: 16px;
        background-color: white;
        width: 100vw;
    }



    input[type=text],
    input[type=password],
    textarea {
        width: 30%;
        padding: 20px;
        margin: 5px 0 22px 0;
        display: flex;
        border: none;
        background: #f1f1f1;
    }

    input[type=text]:focus,
    input[type=password]:focus {
        background-color: whitesmoke;
        outline: none;
    }

    div {
        padding: 10px 0;
    }

    hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
    }

    .registerbtn {
        background-color: firebrick;
        color: white;
        padding: 16px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 20%;
        opacity: 0.9;
        align-items: center;
    }

    .registerbtn:hover {
        opacity: 1;
    }
</style>
</head>
<?php
include('headerlogged.php');

$mysqli = new mysqli('localhost:3307', 'root', '', 'my_auto') or die(mysqli_error($mysqli));
$nume = "";
echo (isset($_POST['nume']) && isset($_POST['parola']) && isset($_POST['email']) && isset($_POST['adresa']) && isset($_POST['telefon']) && isset($_POST['psw-repeat']) && isset($_POST['nr_inmatriculare']));
if (isset($_POST['nume']) && isset($_POST['parola']) && isset($_POST['email']) && isset($_POST['adresa']) && isset($_POST['telefon']) && isset($_POST['psw-repeat']) && isset($_POST['nr_inmatriculare'])) {
    $nume = $_POST['nume'];
    $rol = "utilizator";
    $parola = $_POST['parola'];
    $email = $_POST['email'];
    $adresa = $_POST['adresa'];
    $telefon = $_POST['telefon'];
    $conf_parola = $_POST['psw-repeat'];
    $nr_inmatriculare = $_POST['nr_inmatriculare'];
    $data_inregistrari = date("Y-m-d H:i:s");
    $mysqli->query("INSERT INTO urilizatori (nume, rol, email,  parola, adresa, telefon, data_inregistrare, nr_inmatriculare) VALUES ('$nume','$rol','$email','$parola','$adresa', '$telefon', '$data_inregistrari', 'nr_inmatriculare')") or die($mysqli->error);
    $_POST = array();
}
?>

<body>

    <form action="Cont_nou.php" method="POST">
        <div class="container">
            <center>
                <h1> Creează cont nou</h1>
                <hr>
                <label><b> Nume: </b></label>
                <input type="text" name="nume" size="15" required />
                <label> <br>
                    <b>Număr de telefon: </b>
                </label>
                <input type="text" name="telefon" placeholder="Country Code" value="07" size="2" />
                <label><b>Adresa: </b></label><br>
                <input type="text" name="adresa" for="adresa" required
                    placeholder="Cod poștal, oraș, stradă și număr. " />

                <label for="email"><b>Email:</b></label>
                <input type="text" name="email" required>
                <label for="nr_inmatriculare"><b>Numărul de înmatriculare a mașinii:</b></label>
                <input type="text" name="nr_inmatriculare" required>
                <label for="parola"><b>Parolă:</b></label>
                <input type="password" name="parola" required>

                <label for="psw-repeat"><b>Confirmă parolă:</b></label>
                <input type="password" name="psw-repeat" required>
                <button type="submit" class="registerbtn">Inregistrare</button>
            </center>
        </div>
    </form>


    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</body>

</html>