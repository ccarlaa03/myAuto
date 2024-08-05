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
        h2{
            text-align: center;
        }
    </style>
  </style>
</head>

<body>
  <?php
  session_start();
  include('headerlogged.php');
  if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
    $db = mysqli_connect("localhost:3307", "root", "", "my_auto");
    if (!$db) {
      die('Eroare la conectarea la baza de date: ' . mysqli_connect_error());
    }

    echo '<h2 style="color: firebrick;">Listă furnizori</h2> </br>';
    echo '<hr>';

    $nume_furnizor = $email = $telefon = $adresa = $observati = "";
    $start = 0;
    $limit = 10;
    $id = 1;
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $start = ($id - 1) * $limit;
    }

    $sql = "SELECT * FROM furnizori LIMIT $start, $limit";
    $result = mysqli_query($db, $sql);

    if (!$result) {
      die('Invalid query: ' . mysqli_error($db));
    }

    if (mysqli_num_rows($result) > 0) {
      echo '<table class="unstriped">';
      echo '<thead><tr><th width="50"><b>Nume furnizor</b></th><th width="10"><b>Număr de telefon</b></th><th width="30"><b>Email</b></th><th width="50"><b>Adresă</b></th><th width="150"><b>Date despre client</b></th><th width="10"><b>Acțiuni</b></th></tr></thead>';
      echo '<tbody>';

      while ($myrow = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $myrow["nume_furnizor"] . '</td>';
        echo '<td>' . $myrow["telefon"] . '</td>';
        echo '<td>' . $myrow["email"] . '</td>';
        echo '<td>' . $myrow["adresa"] . '</td>';
        echo '<td>' . $myrow["observati"] . '</td>';
        echo '<td><a href="editare_furnizori.php?id=' . $myrow["id"] . '">Editare</a> <a href="sterge_furnizor.php?id=' . $myrow["id"] . '" onclick="return confirm(\'Sigur doriți să ștergeți această înregistrare?\')">Ștergere</a></td>';
        echo '</tr>';
      }

      echo '</tbody></table>';

      $rows = mysqli_num_rows(mysqli_query($db, "SELECT * FROM furnizori"));
      $total = ceil($rows / $limit);

      if ($id > 1) {
        echo "<a href='?id=" . ($id - 1) . "' class='button'>PREVIOUS </a>";
      }

      if ($id != $total) {
        echo "<a href='?id=" . ($id + 1) . "' class='button'> NEXT</a>";
      }
    } else {
      echo 'Nu există furnizori disponibili.';
    }

    mysqli_close($db);
  }
  ?>

  <br>
  <div align="center">
    <a href="adauga_furnizor.php">Adaugă un furnizor nou</a>
  </div>

  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>
