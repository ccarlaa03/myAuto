<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My AuTo - Contul meu</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="icon" type="image/icon"
        href="https://previews.123rf.com/images/tatianasun/tatianasun1705/tatianasun170500025/77826881-auto-mechanic-car-service-repair-and-maintenance-work-icons-set-isolated-vector-illustration.jpg" />
    <link rel="stylesheet" href="./css/global.css">

    <style>
        @media screen and (max-width: 39.9375em) {}

        @media screen and (min-width: 40em) {}

        @media screen and (min-width: 40em) and (max-width: 63.9375em) {}

        @media screen and (min-width: 64em) {}

        @media screen and (min-width: 64em) and (max-width: 74.9375em) {}

        .button {
            background-color: firebrick;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        table th {
            background-color: #f2f2f2;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table th,
        table td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        @media only screen and (max-width: 600px) {
            table {
                font-size: 8px;
            }
        }

        .btn {
            background-color: firebrick;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>

    </style>
</head>

<body>
    <?php
    session_start();
    include('headerlogged.php');

    if (isset($_SESSION['rol']) && ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'Mecanic')) {
        $db = mysqli_connect("localhost:3307", "root", "", "my_auto");
        echo "<h2 style='color: firebrick; text-align: center;'>Recenzile clienților</h2>";
        echo ("<hr>");

        // Verificarea conexiunii
        if (!$db) {
            die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
        }

        // Interogarea pentru a obține recenziile
        $query = "SELECT * FROM recenzii";
        $result = mysqli_query($db, $query);

        // Verificarea rezultatelor interogării
    
        if (mysqli_num_rows($result) > 0) {

            echo '<form method="POST" action="stergere_recenzii.php">';
            echo "<table class=\"unstriped\">";
            echo "  <thead><tr><th width=\"50\"><b>Selectare</b></th><th width=\"50\"><b>Nume angajat</b></th><th width=\"100\"><b>Părere generală</b></th><th width=\"50\"><b>Rating</b></th><th width=\"100\"><b>Întrebare 1</b></th><th width=\"100\"><b>Întrebare 2</b></th><th width=\"100\"><b>Întrebare 3</b></th></tr></thead> <tbody>";


            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td><input type="checkbox" name="recenzii[]" value="' . $row["id"] . '"></td>';
                echo '<td>' . $row["nume_angajati"] . '</td>';
                echo '<td>' . $row["comentariu"] . '</td>';
                echo '<td>' . $row["rating"] . '</td>';
                echo '<td>' . $row["intrebare1"] . '</td>';
                echo '<td>' . $row["intrebare2"] . '</td>';
                echo '<td>' . $row["intrebare3"] . '</td>';
                echo '</tr>';
            }

            echo " </tbody></table>";
            echo ("<br>");
        } else {
            echo '<p style="text-align: center;">Nu există recenzii disponibile.</p>';
        }

        // Închiderea conexiunii la baza de date
        mysqli_close($db);

        if ($_SESSION['rol'] == 'admin') {
            echo '<div style="text-align: center;">';
            echo '<button class="btn">Ștergere</button>';
            echo '</div>';

        }

    } else {
        echo '<p style="color: red; text-align: center;">Acces restricționat. Nu aveți permisiunea de a vizualiza recenziile.</p>';
    }
    ?>
</body>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>

</html>