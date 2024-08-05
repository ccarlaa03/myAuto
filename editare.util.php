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

      

        @media (max-width: 768px) {
            .unstriped {
                display: block;
                font-size: 11px;
            }
        }



        .container {
            display: flex;
            justify-content: center;
            align-items: center;

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
    

    if (isset($_POST['update'])) {
        $id = mysqli_real_escape_string($db, $_POST['id']);
        $nume = mysqli_real_escape_string($db, $_POST['nume']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $telefon = mysqli_real_escape_string($db, $_POST['telefon']);
        $adresa = mysqli_real_escape_string($db, $_POST['adresa']);
        $data= mysqli_real_escape_string($db, $_POST['data_inregistrare']);

        if (empty($nume) || empty($email) || empty($telefon) || empty($adresa) || empty($data)) {
            echo "Toate câmpurile trebuie completate.";
        } else {
            $query = "UPDATE urilizatori SET nume='$nume', email='$email', telefon='$telefon', adresa='$adresa' , data_inregistrare='$data' WHERE id=$id";
            if (mysqli_query($db, $query)) {
                echo "Utilizatorul a fost actualizat cu succes.";
                header("Location: Lista_conturi_admn_util.php");
                exit();
            } else {
                echo "A apărut o eroare la actualizarea utilizatorului.";
            }
        }

    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM urilizatori WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        $nume = $row['nume'];
        $email = $row['email'];
        $telefon = $row['telefon'];
        $adresa = $row['adresa'];
        $data =  $row['data_inregistrare'];

    }
  }
?>
 
    <h2 style="color: firebrick;">Editare utilizatori</h2><br>
    <hr>

    <div class="container">
        <form align="center" method="POST" action="editare.util.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" value="<?php echo $nume; ?>"><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>"><br>
            <label for="telefon">Telefon:</label>
            <input type="text" name="telefon" value="<?php echo $telefon; ?>"><br>
            <label for="adresa">Adresa:</label>
            <input type="text" name="adresa" value="<?php echo $adresa; ?>"><br>
            <label for="data">Data inregistrare:</label>
            <input type="text" name="data_inregistrare" value="<?php echo $data; ?>"><br>
            <input type="submit" name="update" value="Actualizează">
        </form>
        
    </div>
</body>



<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>
</body>

</html>