<?php
session_start();
include('headerlogged.php');

if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
$db = mysqli_connect("localhost:3307", "root", "", "my_auto");

if (isset($_GET['nr_inmatriculare'])) {
    $nr_inmatriculare = $_GET['nr_inmatriculare'];

    $query = "SELECT COUNT(*) FROM programare WHERE nr_inmatriculare = '$nr_inmatriculare'";
    $result = mysqli_query($db, $query);

    if ($result) {
        $row = mysqli_fetch_array($result);
        $count = $row[0];
        if ($count > 0) {
            header("Location: cauta_ist.php?nr_inmatriculare=" . $nr_inmatriculare);
            exit();
        } else {
            echo "Nu există o mașină înregistrată cu acest număr de înmatriculare.";
        }
    } else {
        echo 'Eroare la interogarea bazei de date: ' . mysqli_error($db);
    }
}
}
?>

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
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

       

        h1 {
            text-align: center;
            color: firebrick;
        }


        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        button {
            background-color: firebrick;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

   
   

    <section>
        <h1>Căutare istoric mașină</h1></br>
        <form method="GET" action="Istoric_mașini.php">
            <label for="nr_inmatriculare">Număr înmatriculare:</label>
            <input type="text" name="nr_inmatriculare" id="nr_inmatriculare">
            <button type="submit" class="btn">Caută</button>
        </form>
    </section>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>