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
        $nume_angajati = mysqli_real_escape_string($db, $_POST['nume_angajati']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $telefon = mysqli_real_escape_string($db, $_POST['telefon']);
        $salariu = mysqli_real_escape_string($db, $_POST['salariu']);

        if (empty($nume_angajati) || empty($email) || empty($telefon) || empty($salariu)) {
            echo "Toate câmpurile trebuie completate.";
        } else {
            $query = "UPDATE angajati SET nume_angajati='$nume_angajati', email='$email', telefon='$telefon', salariu='$salariu' WHERE id=$id";
            if (mysqli_query($db, $query)) {
                echo "Angajatul a fost actualizat cu succes.";
                header("Location: Lista_conturi_adm_ang.php");
                exit();
            } else {
                echo "A apărut o eroare la actualizarea angajatului.";
            }
        }

    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM angajati WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        $nume_angajati = $row['nume_angajati'];
        $email = $row['email'];
        $telefon = $row['telefon'];
        $salariu = $row['salariu'];
    }
}
?>
   <h2 style="color: firebrick;">Editare conturi angajați</h2><br>
<hr>
    <div class="container">
        <form align="center" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="nume_angajati">Nume:</label>
            <input type="text" name="nume_angajati" value="<?php echo $nume_angajati; ?>"><br>
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>"><br>
            <label for="telefon">Telefon:</label>
            <input type="text" name="telefon" value="<?php echo $telefon; ?>"><br>
            <label for="salariu">Salariu:</label>
            <input type="text" name="salariu" value="<?php echo $salariu; ?>"><br>
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