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


        @media only screen and (max-width: 600px) {
        table {
            width: 100%;
        }

        table thead {
            display: none;
        }

        table tbody {
            display: block;
            width: 100%;
        }

        table tbody tr {
            display: block;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }

        table tbody td {
            display: block;
            text-align: left;
            width: 100%;
        }

        table tbody td:before {
            content: attr(data-label);
            font-weight: bold;
            display: inline-block;
            width: 120px;
        }

        table tbody td:last-child {
            border-bottom: 0;
        }

        table tbody td:before {
            display: none;
        }
    }
        h2 {
            text-align: center;
            color: firebrick;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    include('headerlogged.php');
    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') {
        echo ('<h2 style="color: firebrick;">Mașini în Service</h2>');
        echo ('<hr>');

        $db = mysqli_connect("localhost:3307", "root", "");
        $database = "my_auto";
        if (!mysqli_select_db($db, $database)) {
            die("Selectarea bazei de date a eșuat: " . mysqli_error($db));
        }

        $nume = $marca_masina = $serie_sasiu = $nr_inmatriculare = $descriere = $status = "";
        $timp = date("d/m/Y H:i:s");
        $start = 0;
        $limit = 10;
        $id = 1;
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $start = ($id - 1) * $limit;
        }

        $sqlv = "SELECT programare.id, programare.nume, programare.data_ora_programare, programare.marca_masina, programare.serie_sasiu, programare.nr_inmatriculare, servicii.nume_serviciu, programare.status
        FROM programare
        JOIN sarcini_mecanici ON programare.id = sarcini_mecanici.programare_id
        JOIN servicii ON sarcini_mecanici.servicii_id = servicii.id
        WHERE programare.status IN ('În curs de lucru', 'Finalizată')
        ORDER BY programare.data_ora_programare DESC";


        $resultv = mysqli_query($db, $sqlv);
        if (!$resultv) {
            die('Interogarea nevalidă: ' . mysqli_error($db));
        } else {
            echo "<table class=\"unstriped\">";
            echo "<thead><tr><th width=\"50\"><b>Id</b></th><th width=\"200\"><b>Nume client</b></th><th width=\"350\"><b>Data și ora programării</b></th><th width=\"200\"><b>Marca mașinii</b></th><th width=\"200\"><b>Serie de șasiu</b></th><th width=\"300\"><b>Nr. înmatriculare</b></th><th width=\"300\"><b>Descriere</b></th><th width=\"150\"><b>Status</b></th><th width=\"100\" ><b>Acțiuni</b></th></tr></thead><tbody>";
            while ($myrow = mysqli_fetch_array($resultv, MYSQLI_ASSOC)) {
                echo "<tr><td>";
                echo $myrow["id"];
                echo "</td><td>";
                echo $myrow["nume"];
                echo "</td><td>";
                echo $myrow["data_ora_programare"];
                echo "</td><td>";
                echo $myrow["marca_masina"];
                echo "</td><td>";
                echo $myrow["serie_sasiu"];
                echo "</td><td>";
                echo $myrow["nr_inmatriculare"];
                echo "</td><td>";
                echo $myrow["nume_serviciu"];
                echo "</td><td>";
                echo $myrow["status"];
                echo "</td>";
                echo "<td><a href='editare_mas_service.php?id=" . $myrow["id"] . "'>Editare</a></td></tr>";
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

th, td {
  text-align: left;
  padding: 8px;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}
@media screen and (max-width: 600px) {
  table td, table th {
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

    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>