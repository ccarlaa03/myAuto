<!DOCTYPE html>
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
      color: firebrick;
      text-align: center;
    }
  </style>
</head>

<body>


  <?php
  session_start();
  include('headerlogged.php');

  if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'utilizator') {
    $db = mysqli_connect("localhost:3307", "root", "", "my_auto");


    $nr_inmatriculare = $_GET['nr_inmatriculare'];


    $query = "SELECT p.nr_inmatriculare, p.serie_sasiu, p.marca_masina, p.data_ora_programare, ser.pret, p.status, s.nume_angajati, ser.nume_serviciu
    FROM programare p
    LEFT JOIN sarcini_mecanici s ON p.id = s.programare_id
    INNER JOIN urilizatori u ON p.nr_inmatriculare = u.nr_inmatriculare AND p.nume = u.nume
    INNER JOIN servicii ser ON s.servicii_id = ser.id
    WHERE p.nr_inmatriculare = '$nr_inmatriculare'";
    

    $subtitle2 = "Istoric mașină";
    $subtitle1 = "Mașina mea";
    $result = mysqli_query($db, $query);
    $result2 = mysqli_query($db, $query);

    if ($result) {
      echo "<h2 style='color:firebrick; text-align:center;'>" . $subtitle1 . "</h2>";
      echo '<table style="margin: 0 auto;">';
      echo '<br>';
      echo '<tr><th>Număr de înmatriculare</th><th>Serie șasiu</th><th>Marca mașinii</th></tr>';

      $alreadyDisplayed = false; // Variabila booleana pentru a verifica daca datele au fost deja afisate

      while ($row = mysqli_fetch_assoc($result)) {
          if (!$alreadyDisplayed) {
              echo '<tr>';
              echo '<td>' . $row['nr_inmatriculare'] . '</td>';
              echo '<td>' . $row['serie_sasiu'] . '</td>';
              echo '<td>' . $row['marca_masina'] . '</td>';
              echo '</tr>';
              $alreadyDisplayed = true; // Seteaza variabila booleana la true pentru a marca faptul ca datele au fost afisate
          }
      }
      
      echo '</table>';
      echo '<br>';
      echo "<h2 style='color:firebrick; text-align:center;'>" . $subtitle2 . "</h2>";
      echo '<table style="margin: 0 auto;">';
      echo '<br>';
      echo '<tr><th>Descriere</th><th>Data și ora programării</th><th>Cost reparație</th><th>Nume mecanic</th></tr>';
      while ($row = mysqli_fetch_assoc($result2)) {
        echo '<tr>';
        echo '<td>' . $row['nume_serviciu'] . '</td>';
        echo '<td>' . $row['data_ora_programare'] . '</td>';
        echo '<td>' . $row['pret'] . '</td>';
        echo '<td>' . $row['nume_angajati'] . '</td>';
        echo '</tr>';
      }
      

      echo '</table>';
    } else {
      echo 'Eroare la interogarea bazei de date: ' . mysqli_error($db);
    }
  }
  ?>



  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>