

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
        }

        section {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            margin: 20px;
            border: 1px solid #ccc;
        }

        .btn {
            background-color: firebrick;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }


        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;

        }

        form {
            display: inline-block;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;

        }

        label {
            margin-right: 10px;
        }

        input[type="text"] {
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: firebrick;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

    </style>
</head>

<body>

<?php
session_start();
include('headerlogged.php');

if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
$db = mysqli_connect("localhost:3307", "root", "");
mysqli_select_db($db,"my_auto");
$nume_angajati = $descriere = $nr_inmatriculare = $marca_masina =$serie_sasiu = $data_ora_programare = $cost_rep = $durata_estimata = "";


if ((isset($_POST["nume_angajati"])) && (isset($_POST["descriere"])) && (isset($_POST["nr_inmatriculare"])) && (isset($_POST["marca_masina"])&& (isset($_POST["serie_sasiu"])))&& (isset($_POST["data_ora_programare"]))&& (isset($_POST["cost_rep"]))&& (isset($_POST["durata_estimata"]))) {
    $nume_angajati = $_POST["nume_angajati"];
    $descriere = $_POST["descriere"];
    $nr_inmatriculare = $_POST["nr_inmatriculare"];
    $marca_masina = $_POST["marca_masina"];
    $serie_sasiu= $_POST["serie_sasiu"];
    $data_ora_programare = $_POST["data_ora_programare"];
    $cost_rep = $_POST["cost_rep"];
    $durata_estimata = $_POST["durata_estimata"];


    $sql1 = "INSERT INTO sarcini_mecanici (nume_angajati,cost_rep) VALUES ('$nume_angajati','$cost_rep')";
   $sql2 = "INSERT INTO programare (descriere,nr_inmatriculare,marca_masina,serie_sasiu,data_ora_programare,cost_rep,durata_estimata) VALUES ('$descriere','$nr_inmatriculare','$marca_masina' , '$serie_sasiu', '$data_ora_programare', '$cost_rep','$durata_estimata')";
   $_POST = array();
   
    $results = mysqli_query($db, $sql1, $sql2);
    if (!$results) {
      die('Invalid querry:' . mysqli_error($db));
    } else {
        header("Location:Mecanici.php");
      echo "Inregistrarea a fost adaugata.";
        exit();
    }
  }
}
?>


    <section>
        <center>
            <form method="POST" action="Sarcini.php">
            <h2 style="color: firebrick;">Adăugați o sarcină nouă</h2>

                <label for="nume_angajati" >Mecanic:</label>
                <input type="text" id="nume_angajati" name="nume_angajati" required>
                <label for="descriere">Descriere:</label>
                <input type="text" id="descriere"  name="decriere" required>
                <label for="nr_inmatriculare" >Numărul de înmatriculare al mașinii:</label>
                <input type="text" id="nr_inmatriculare" nume = "nr_inmatriculare" required>
                <label for="marca_masina">Marca mașinii:</label>
                <input type="text" id="marca_masina" name="marca_masina" required>
                <label for="serie_sasiu">Seria de șasiu:</label>
                <input type="text" id="serie_sasiu" name="serie_sasiu" required>
                <label for="data_ora_programare">Data și ora programării:</label>
                <input type="datetime-local" id="data_ora_programare" name="data_ora_programare" required>
                <label for="cost_rep">Costuri:</label>
                <input type="text" id="cost_rep" min="0" name="cost_rep" required>
                <label for="durata_estimata">Durată estimată:</label>
                <input type="text" id="durata_estimata" name="durata_estimata" required>
                <br>
                <button type="submit" class="btn">Adaugă</button>
            </form>
        </center>
    </section>

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>