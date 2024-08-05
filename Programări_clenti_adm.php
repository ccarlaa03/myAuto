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


        @media (max-width: 600px) {

            table {
                font-size: 10px;
            }

            th,
            td {
                padding: 3px;
            }

            th {
                display: none;
            }

            tr {
                display: block;
                margin-bottom: 5px;
                border: 1px solid #ddd;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                display: block;
                margin-bottom: 3px;
            }
        }

        h2 {
            text-align: center;

        }
    </style>
</head>

<body>

    <?php
    session_start();
    include('headerlogged.php');
    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') {
        echo ('<h2 style="color: firebrick;">Programări</h2>');
        echo ('<hr>');
        $db = mysqli_connect("localhost:3307", "root", "");
        if (!$db) {
            die("Conectarea la baza de date a eșuat: " . mysqli_connect_error());
        }

        $database = "my_auto";
        if (!mysqli_select_db($db, $database)) {
            die("Selectarea bazei de date a eșuat: " . mysqli_error($db));
        }

        $nume = $nume_serviciu = $status = $imagine_daune = "";
        $timp = date("d/m/Y H:i:s");
        $start = 0;
        $limit = 13;
        $id = 1;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $start = ($id - 1) * $limit;
        }
        $sqlv = "SELECT programare.id, programare.nume, programare.data_ora_programare, servicii.nume_serviciu, programare.status, programare.imagine_daune
    FROM programare
    JOIN sarcini_mecanici ON programare.id = sarcini_mecanici.programare_id
    JOIN servicii ON sarcini_mecanici.servicii_id = servicii.id
    WHERE programare.status = 'În așteptare' AND DATE(programare.data_ora_programare) > '$timp'
    ORDER BY programare.data_ora_programare ASC";

        $resultv = mysqli_query($db, $sqlv);
        if (!$resultv) {
            die('Interogarea nevalidă: ' . mysqli_error($db));
        } else {
            echo "<table class=\"unstriped\">";
            echo "<thead><tr><th width=\"50\"><b>Id</b></th><th width=\"100\"><b>Nume</b></th><th width=\"200\"><b>Data și ora programării</b></th><th width=\"150\"><b>Descriere</b></th><th width=\"100\"><b>Status</b></th><th width=\"100\" ><b>Acțiuni</b></th><th width=\"100\"><b>Imagine daune</b></th></tr></thead><tbody>";
            while ($myrow = mysqli_fetch_array($resultv, MYSQLI_ASSOC)) {
                echo "<tr><td>";
                echo $myrow["id"];
                echo "</td><td>";
                echo $myrow["nume"];
                echo "</td><td>";
                echo $myrow["data_ora_programare"];
                echo "</td><td>";
                echo $myrow["nume_serviciu"];
                echo "</td><td>";
                echo $myrow["status"];
                echo "</td>";
                echo "<td><a href='editare_prog.php?id=" . $myrow["id"] . "'>Editare</a>  <a href='delete.php?id=" . $myrow["id"] . "' onclick=\"return confirm('Sigur doriți să ștergeți această înregistrare?')\">Ștergere</a></td>";
                echo "<td>  <a href='imagini_daune/" . $myrow["imagine_daune"] . "' download>Descarcă imaginea</a><br>
             
                
                </td></tr>";
            }

            echo "</tbody></table>";

            $rows = mysqli_num_rows(mysqli_query($db, "SELECT * FROM programare "));
            $total = ceil($rows / $limit);

            if ($id > 1) {
                echo "<a href='?id=" . ($id - 1) . "' class='button'>ANTERIOR </a>";
            }

            if ($id != $total) {
                echo "<a href='?id=" . ($id + 1) . "' class='button'> URMĂTOR</a>";
            }
        }
    }


    echo "<style>
        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        @media screen and (max-width: 600px) {

            table td,
            table th {
                padding: 2px;
                font-size: 10px;
            }

            table th {
                font-size: 10px;
            }

            @media only screen and (max-width: 600px) {

                .top-bar-left {
                    display: none;
                }

                .dropdown.menu.vertical {
                    display: block !important;
                }
            }
        }
    </style>"

        ?>

    <br>
    <div align="center">
        <a href="adauga_prog.php">Adaugă o programare</a>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>

</body>

</html>