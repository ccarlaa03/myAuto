

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


    input[type="text"],
    input[type="email"] {
      font-size: 16px;
      width: 300px;
      height: 40px;
    }

    input[type="date"] {
      font-size: 16px;
      width: 300px;
      height: 40px;
    }

    h2 {
      text-align: center;
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
  $nume = $email = $telefon = $date = "";


  if ((empty($_POST["nume"])) && (empty($_POST["email"])) && (empty($_POST["telefon"]))) {

  } else {
    $nume = $_POST["nume"];
    $email = $_POST["email"];
    $telefon = $_POST["telefon"];
    $rol = "Mecanic";
    $data_inregistrari = date("d/m/Y");


    $sql = "INSERT INTO angajati (nume,email,telefon,rol,data_inregistrare) VALUES ('$nume','$email','$telefon','$rol', '$date')";


    $results = mysqli_query($db, $sql);
    if (!$results) {
      die('Invalid querry:' . mysqli_error($db));
    } else {
      echo "Inregistrarea a fost adaugata.";
      header("Location: Lista_conturi_adm_ang.php");
      exit();
    }
  }
}
?>
  <center>
  <h2 style="color: firebrick;">Adaugă angajați noi</h2><br>

    <form method="POST" action="admin_crud_adauga.php">
      <label for="nume">Nume:</label>
      <input type="text" name="nume" id="nume" size="30">
      <label for="email">Adresa de e-mail:</label>
      <input type="email" name="email" id="email" size="30">
      <label for="telefon">Nr. telefon:</label>
      <input type="text" name="telefon" id="telefon" size="30">

      <br>
      <button type="submit" class="btn">Adaugă personă</button>
    </form>
  </center>


  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>