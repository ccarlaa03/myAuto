<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My AuTo - Gestionare întrebări</title>
    <link rel="icon" type="images/icon"
        href="https://previews.123rf.com/images/tatianasun/tatianasun1705/tatianasun170500025/77826881-auto-mechanic-car-service-repair-and-maintenance-work-icons-set-isolated-vector-illustration.jpg" />
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="./css/global.css">

</head>
<style>
    .container {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        height: 100vh;
    }

    .content {
        width: 500px;
        padding: 30px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
</style>

<body>
<?php
session_start();
include('headerlogged.php');

if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {

    $db = mysqli_connect("localhost:3307", "root", "", "my_auto");

    if (isset($_POST['intrebare_id']) && isset($_POST['raspuns'])) {
        $intrebare_id = $_POST['intrebare_id'];
        $raspuns = $_POST['raspuns'];

        $query = "UPDATE mesaje SET raspuns = '$raspuns' WHERE id = $intrebare_id";

        if (mysqli_query($db, $query)) {
            echo "Răspunsul a fost adăugat cu succes.";
            header("Location: FAQ.php");
    exit;
        } else {
            echo "A apărut o eroare la adăugarea răspunsului.";
        }
    }

    $query = "SELECT id, intrebare, raspuns FROM mesaje";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $intrebare_id = $row['id'];
            $intrebare = $row['intrebare'];
            $raspuns = $row['raspuns'];

            if (empty($raspuns)) {
                echo "<div class='container table-style'>";
                echo "<div class='content' align='center'>";
                echo "<h3>$intrebare</h3>";
                echo "<form method='POST' action='raspuns_faq.php'>";
                echo "<input type='hidden' name='intrebare_id' value='$intrebare_id'>";
                echo "<textarea name='raspuns' required></textarea>";
                echo '<a href="raspuns_faq.php" class="button" style="background-color: firebrick; color: white;">Răspunde</a>';
                echo "</form>";
                echo "</div>";
                echo "</div>";
            }
        }
    } else {
        echo "Nu există întrebări disponibile.";
    }

    mysqli_close($db);
} else {
    echo "Accesul la această pagină este permis doar mecanicilor.";
}
?>


    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>

</body>

</html>