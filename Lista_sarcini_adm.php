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

    h2 {
      text-align: center;
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
  if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') {
    $db = mysqli_connect("localhost:3307", "root", "");
    mysqli_select_db($db, "my_auto");

    echo('<h2 style="color: firebrick;">Sarcini mecanici</h2> </br>');
    echo('<hr>');
    $query = "SELECT programare.nr_inmatriculare, programare.marca_masina,  programare.serie_sasiu, programare.data_ora_programare, angajati.nume_angajati,  servicii.nume_serviciu, servicii.pret
    FROM programare
    JOIN sarcini_mecanici ON programare.id = sarcini_mecanici.programare_id
    JOIN angajati ON angajati.nume_angajati = sarcini_mecanici.nume_angajati
    JOIN servicii ON servicii.id = sarcini_mecanici.servicii_id
    WHERE DATE(programare.data_ora_programare) = CURDATE()";

    $result = mysqli_query($db, $query);

    if ($result) {
      echo "<table class=\"unstriped\">";
      echo "<thead><tr><th width=\"100\"><b>Mecanic</b></th><th width=\"250\"><b>Nr. înmatriculare</b></th><th width=\"100\"><b>Marca mașinii</b></th><th width=\"200\"><b>Serie de șasiu</b></th><th width=\"150\"><b>Oră programare</b></th><th width=\"200\"><b>Descriere</b></th><th width=\"200\"><b>Costuri</b></th></tr></thead><tbody>";

      while ($myrow = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "<tr><td>";
        echo $myrow["nume_angajati"];
        echo "</td><td>";
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
        echo "</td></tr>";
      }
    }
    echo " </tbody></table>";
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
  <br>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>