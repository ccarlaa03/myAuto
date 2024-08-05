<!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My AuTo - Contul meu</title>
  <link rel="stylesheet" href="css/foundation.css">
  <link rel="icon" type="images/icon"
    href="https://previews.123rf.com/images/tatianasun/tatianasun1705/tatianasun170500025/77826881-auto-mechanic-car-service-repair-and-maintenance-work-icons-set-isolated-vector-illustration.jpg" />
  <link rel="stylesheet" href="./css/global.css">

  <style>
    @media screen and (max-width: 39.9375em) {}

    @media screen and (min-width: 40em) {}

    @media screen and (min-width: 40em) and (max-width: 63.9375em) {}

    @media screen and (min-width: 64em) {}

    @media screen and (min-width: 64em) and (max-width: 74.9375em) {}

    .container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      height: 100vh;
    }

    .content {
      width: 500px;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      border: 2px solid firebrick;
    }

    input[type="text"],
    input[type="email"] {
      width: 250px;
      padding: 5px;
      border: 1px solid #ccc;
      align: center;
      margin-left: auto;
      margin-right: auto;
    }


    form {
      text-align: center;
    }

    .btn {
      background-color: firebrick;
      color: #FFFFFF;
      border: none;
      padding: 10px 20px;
      border-radius: 5px;


    }

    html,
    body {
      height: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1;
      padding-bottom: 60px;
      /* Înălțimea footer-ului */
    }

    .footer {
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      background-color: #f9f9f9;
      padding: 20px;
      text-align: center;
    }
  </style>
</head>

<body>


  <?php
  session_start();
  include('headerlogged.php');

  $db = mysqli_connect("localhost:3307", "root", "", "my_auto");
  $subtitle1 = "Date personale";
  $subtitle2 = "Mașinile mele";

  // Verificăm dacă utilizatorul este autentificat și are permisiuni adecvate
  
  $idUtilizatorConectat = $_SESSION['id'];

  $sqlv = "SELECT * FROM urilizatori WHERE id = $idUtilizatorConectat";
  $resultv = mysqli_query($db, $sqlv);

  if (!$resultv) {
    die('Invalid query: ' . mysqli_error($db));
  } else {
    echo '<br>';
    echo '<div class="container">';
    echo '<div class="content">';
    echo "<h2 style='color:firebrick; text-align:center;'>" . $subtitle1 . "</h2>";
    echo '<br>';
    while ($row = mysqli_fetch_array($resultv, MYSQLI_ASSOC)) {
      echo '<div style="text-align: center; margin-top: 10px; font-size: 20px;">';
      echo '<label for="nume">Nume:</label>';
      echo '<input type="text" name="nume" value="' . $row["nume"] . '">';
      echo '<label for="email">Email:</label>';
      echo '<input type="email" name="email" value="' . $row["email"] . '">';
      echo '<label for="telefon">Telefon:</label>';
      echo '<input type="text" name="telefon" value="' . $row["telefon"] . '">';
      echo '<label for="adresa">Adresa:</label>';
      echo '<input type="text" name="adresa" value="' . $row["adresa"] . '">';
      echo '<label for="adresa">Număr de mașină:</label>';
      echo '<input type="text" name="numar" value="' . $row["nr_inmatriculare"] . '">';
    }
    echo '<br>';
    echo '<div style="text-align: center; margin-top: 10px; font-size: 20px;">';
    echo '<a href="edit_cont.php" class="button" style="background-color: firebrick; color: white;">Editează datele personale</a>';
    echo '</div>';

    echo '<br>';
    echo "<h2 style='color:firebrick; text-align:center;'>" . $subtitle2 . "</h2>";
    if (isset($_GET['nr_inmatriculare']) & isset($_GET['nume'])) {

      $nr_inmatriculare = ($_GET['nr_inmatriculare']);
      $nume = ($_GET['nume']);

      $query = "SELECT COUNT(*) FROM programare WHERE nr_inmatriculare = '$nr_inmatriculare' AND nume = '$nume'";

      $result1 = mysqli_query($db, $query);


      if ($result1) {
        $row = mysqli_fetch_array($result1);
        $count = $row[0];
        if ($count > 0) {
          header("Location: Mașina_1.php?nr_inmatriculare=" . $nr_inmatriculare);
          exit();
        }
      } else {
        echo 'Eroare la interogarea bazei de date: ' . mysqli_error($db);
      }
    }
  }

  ?>

  <form method="GET" action="Mașina_1.php">
    <label for="nr_inmatriculare">Număr înmatriculare:</label>
    <input type="text" name="nr_inmatriculare" id="nr_inmatriculare"><br>
    <label for="nume">Numele titularului:</label>
    <input type="text" id="nume" name="nume">
    <button type="submit" class="button" style="background-color: firebrick; color: white;">Caută istoricul
      mașinilor</button>

  </form>

</body>

<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
  $(document).foundation();
</script>

</html>