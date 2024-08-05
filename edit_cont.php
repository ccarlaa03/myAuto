<!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My AuTo</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="icon" type="images/icon"
        href="https://previews.123rf.com/images/tatianasun/tatianasun1705/tatianasun170500025/77826881-auto-mechanic-car-service-repair-and-maintenance-work-icons-set-isolated-vector-illustration.jpg" />
    <link rel="stylesheet" href="./css/global.css">
</head>

<style>
    @media screen and (max-width: 39.9375em) {}

    @media screen and (min-width: 40em) {}

    @media screen and (min-width: 40em) and (max-width: 63.9375em) {}

    @media screen and (min-width: 64em) {}

    @media screen and (min-width: 64em) and (max-width: 74.9375em) {}

    h2 {
        text-align: center;
        color: firebrick;
    }

    input[type="submit"][name="update"] {
        background-color: firebrick;
        width: 200px;
        height: 40px;
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

<body>
    <?php
    session_start();
    include('headerlogged.php');
    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'utilizator') {

        $db = mysqli_connect("localhost:3307", "root", "");
        mysqli_select_db($db, "my_auto");

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $nume = $_POST['nume'];
            $email = $_POST['email'];
            $telefon = $_POST['telefon'];
            $adresa = $_POST['adresa'];


            if (empty($nume) || empty($email) || empty($telefon) || empty($adresa)) {
                echo "Toate câmpurile trebuie completate.";
            } else {

                $query = "UPDATE urilizatori SET nume='$nume', email='$email', telefon='$telefon', adresa='$adresa' WHERE id=$id";
                if (mysqli_query($db, $query)) {
                    echo "Datele dvs. au fost actualizate cu succes.";
                    header("Location: Contul_meu.php");
                } else {
                    echo "A apărut o eroare la actualizare.";
                }
            }
        }

        $id = $_SESSION['id'];
        $result = mysqli_query($db, "SELECT * FROM 	urilizatori WHERE id='$id'");
        $row = mysqli_fetch_assoc($result);
        $nume = $row['nume'];
        $email = $row['email'];
        $telefon = $row['telefon'];
        $adresa = $row['adresa'];
    }
    ?>
    <div class="container">
        <form align="center" method="POST" action="edit_cont.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="nume">Nume:</label>
            <input type="text" name="nume" value="<?php echo $nume; ?>" style="width: 250px; height: 40px;">
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>" style="width: 250px; height: 40px;">
            <label for="telefon">Telefon:</label>
            <input type="text" name="telefon" value="<?php echo $telefon; ?>" style="width: 250px; height: 40px;">
            <label for="adresa">Adresa:</label>
            <input type="text" name="adresa" value="<?php echo $adresa; ?>" style="width: 250px; height: 40px;">
            <input type="submit" name="update" value="Actualizează" class="button"
                style="background-color: firebrick; color: white;">

        </form>
    </div>


    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
        $('.dropdown').foundation();
    </script>
</body>

</html>