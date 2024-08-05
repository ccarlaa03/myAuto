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

        .container {
            margin: auto;
            max-width: 800px;
            padding: 20px;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    include('headerlogged.php');
    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'utilizator') {
        $db = mysqli_connect("localhost:3307", "root", "", "my_auto");
        $title = "Statusul mașinii la atelier";

        if (isset($_GET['nr_inmatriculare'])) {
            $nr_inmatriculare = $_GET['nr_inmatriculare'];

            $query = "SELECT  serv.nume_serviciu, p.data_ora_programare, serv.pret, p.status, s.nume_angajati
            FROM programare p
            LEFT JOIN sarcini_mecanici s ON p.id = s.programare_id
            LEFT JOIN servicii serv ON s.servicii_id = serv.id
            WHERE p.nr_inmatriculare = '$nr_inmatriculare'";


            $result = mysqli_query($db, $query);
            echo '<div class="container">';
            if ($result) {
                echo "<h2 style='color:firebrick; text-align:center;'>" . $title . "</h2>";
                echo '<br>';
                if (mysqli_num_rows($result) > 0) {
                    echo '<table>';
                    echo '<tr><th>Nume serviciu</th><th>Data și ora programării</th><th>Cost reparație</th><th>Status lucrare</th><th>Nume mecanic</th></tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['nume_serviciu'] . '</td>';
                        echo '<td>' . $row['data_ora_programare'] . '</td>';
                        echo '<td>' . $row['pret'] . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                        echo '<td>' . $row['nume_angajati'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo '<div style="text-align: center;">Nu există programări pentru mașina specificată.</div>';

                }
            } else {
                echo 'Eroare la interogarea bazei de date: ' . mysqli_error($db);
            }
        }
    }
    ?>

    </br>
    <p align="center "><i>Pentru informații suplimentare, vă rugăm să ne contactați la numărul de telefon 0749 889 999
            sau pe adresa de mail my.auto@gmail.com</i></p>



    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>