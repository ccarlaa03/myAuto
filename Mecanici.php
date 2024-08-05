<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My AuTo</title>
    <link rel="icon" type="image/icon"
        href="https://previews.123rf.com/images/tatianasun/tatianasun1705/tatianasun170500025/77826881-auto-mechanic-car-service-repair-and-maintenance-work-icons-set-isolated-vector-illustration.jpg">
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/global.css">
    <style>
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


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e6e6e6;
        }

        .login-button {
            padding: 12px;
            background: firebrick;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
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
    </style>
</head>

<body>


    <?php
    session_start();
    include('headerlogged.php');
    echo ('<h2 style="color: firebrick;" align="center">Listă de sarcini</h2>');
 

    $db = mysqli_connect("localhost:3307", "root", "");
    mysqli_select_db($db, "my_auto");

    $start = 0;
    $limit = 10;
    $id = 1;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $start = ($id - 1) * $limit;
    }
    $query = "SELECT programare.id, programare.marca_masina, programare.nr_inmatriculare, programare.serie_sasiu, programare.data_ora_programare, angajati.nume_angajati, servicii.pret, programare.status, servicii.nume_serviciu, servicii.durata_estimata
    FROM programare
    JOIN sarcini_mecanici ON programare.id = sarcini_mecanici.programare_id
    JOIN angajati ON angajati.nume_angajati = sarcini_mecanici.nume_angajati
    JOIN servicii ON servicii.id = sarcini_mecanici.servicii_id
    WHERE DATE(programare.data_ora_programare) = CURDATE()";


    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<table class=\"unstriped\">";
        echo "<thead><tr><th width=\"250\"><b>Nr. înmatriculare</b></th><th width=\"200\"><b>Marca mașinii</b></th><th width=\"200\"><b>Serie de șasiu</b></th><th width=\"300\"><b>Data și ora programării</b></th><th width=\"250\"><b>Descriere</b></th><th width=\"200\"><b>Costuri</b></th><th width=\"200\"><b>Durata estimată</b></th><th width=\"300\"><b>Status</b></th><th width=\"150\"><b>Acțiuni</b></th></tr></thead><tbody>";

        while ($myrow = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            echo "<tr><td>";

            echo $myrow["nr_inmatriculare"];
            echo "</td><td>";
            echo $myrow["marca_masina"];
            echo "</td><td>";
            echo $myrow["serie_sasiu"];
            echo "</td><td>";
            echo $myrow["data_ora_programare"];
            echo "</td><td>";
            echo $myrow["nume_serviciu"];
            echo "</td><td>";
            echo $myrow["pret"];
            echo "</td><td>";
            echo $myrow["durata_estimata"];
            echo "</td><td>";
            echo $myrow["status"];
            echo "</td>";

            if (isset($myrow["id"])) {
                echo "<td><a href='editare.php?id=" . $myrow["id"] . "'>Editare</a>  <a href='sterge.php?id=" . $myrow["id"] . "' onclick=\"return confirm('Sigur doriți să ștergeți această înregistrare?')\">Ștergere</a></td>";
            }
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

        mysqli_close($db);
    } else {
        echo "Nu aveți privilegiile necesare pentru a accesa această pagină.";
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
    padding: 5px;
    font-size: 12px;
  }

  table th {
    font-size: 14px;
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
    </section>
    <br>
  
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>