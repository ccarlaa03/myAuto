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

    h2 {
      text-align: center;
      color: firebrick;
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
    .btn {
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
  if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') {

$db = mysqli_connect("localhost:3307", "root", "");
mysqli_select_db($db, "my_auto");
echo ('<h2 style="color: firebrick;">Listă conturi utilizatori</h2> </br>');
echo ('<hr>');
$nume = $email = $telefon = $adresa = $rol = "";
$data_inregistrare = date("d/m/Y");
$start = 0;
$limit = 10;
$id = 1;
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $start = ($id - 1) * $limit;
}

$sqlv = "SELECT * FROM urilizatori LIMIT $start, $limit";

$resultv = mysqli_query($db, $sqlv);
if (!$resultv)
  die('Invalid querry:' . mysqli_error($db));
else {
  echo "<table class=\"unstriped\">";
  echo "  <thead><tr><th width=\"50\"><b>Id</b></th><th width=\"100\"><b>Nume</b></th><th width=\"150\"><b>Email</b></th><th width=\"150\"><b>Telefon</b></th><th width=\"150\"><b>Adresa</b></th><th width=\"150\"><b>Rol</b></th><th width=\"150\"><b>Data inregistrare</b></th><th width=\"300\"><b>Acțiuni</b></th></tr></tr></thead> <tbody>";
  while ($myrow = mysqli_fetch_array($resultv, MYSQLI_ASSOC)) {
    echo "<tr><td>";
    echo $myrow["id"];
    echo "</td><td>";
    echo $myrow["nume"];
    echo "</td><td>";
    echo $myrow["email"];
    echo "</td><td>";
    echo $myrow["telefon"];
    echo "</td><td>";
    echo $myrow["adresa"];
    echo "</td><td>";
    echo $myrow["rol"];
    echo "</td><td>";
    echo $myrow["data_inregistrare"];
    echo "</td>";
    echo "<td><a href='editare.util.php?id=" . $myrow["id"] . "'>Editare</a>  <a href='delete2.php?id=" . $myrow["id"] . "' onclick=\"return confirm('Sigur doriți să ștergeți această înregistrare?')\">Ștergere</a></td></tr>";

  }

  echo " </tbody></table>";

  $rows = mysqli_num_rows(mysqli_query($db, "SELECT * FROM urilizatori "));
  $total = ceil($rows / $limit);

  if ($id > 1) {
    echo "<a href='?id=" . ($id - 1) . "' class='button'>PREVIOUS </a>";
  }

  if ($id != $total) {
    echo "<a href='?id=" . ($id + 1) . "' class='button'> NEXT</a>";
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
  <div align="center">
  <a  href="adauga_util.php" >Adaugă un cont nou</a>
</div>
  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>