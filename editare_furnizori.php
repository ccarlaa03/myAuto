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
if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
    $db = mysqli_connect("localhost:3307", "root", "", "my_auto");
    if (!$db) {
        die("Database connection failed: " . mysqli_connect_error());
    }
    echo('<h2 style="color: firebrick;">Editare furnizor</h2> </br>');


    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nume_furnizor = $_POST['nume_furnizor'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $adresa = $_POST['adresa'];
        $observati = $_POST['observati'];

        if (empty($nume_furnizor) || empty($telefon) || empty($email) || empty($adresa) || empty($observati)) {
            echo "Toate câmpurile trebuie completate.";
        } else {
            $query = "UPDATE furnizori SET nume_furnizor='$nume_furnizor', telefon='$telefon', adresa='$adresa', email='$email', observati='$observati' WHERE id=$id";


            if (mysqli_query($db, $query) && mysqli_query($db, $query)) {
                echo "Furnizorul a fost actualizat cu succes.";
                header("Location: furnizori.php");
                exit();
            } else {
                echo "A apărut o eroare la actualizare.";
            }
        }
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = mysqli_query($db, "SELECT * FROM furnizori WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        $nume_furnizor = $row['nume_furnizor'];
        $telefon = $row['telefon'];
        $email = $row['email'];
        $adresa = $row['adresa'];
        $observati = $row['observati'];
    }
}
?>
<div class="container">
    <form method="POST" action="editare_furnizori.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="nume_furnizor">Nume furnizor:</label>
        <input type="text" name="nume_furnizor" value="<?php echo $nume_furnizor; ?>" required>

        <label for="telefon">Număr de telefon:</label>
        <input type="text" name="telefon" value="<?php echo $telefon; ?>" required>

        <label for="email">Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>" required>

        <label for="adresa">Adresa:</label>
        <input type="text" name="adresa" value="<?php echo $adresa; ?>" required>

        <label for="observati">Date despre client:</label>
        <input type="text" name="observati" value="<?php echo $observati; ?>" required>

        <input type="submit" name="update" value="Actualizează datele">
    </form>
</div>

</body>



<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>