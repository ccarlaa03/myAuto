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
    </style>
</head>

<body>

<?php
session_start();
include('headerlogged.php');

$db = mysqli_connect("localhost:3307", "root", "", "my_auto");
echo "<h2 style='color: firebrick; text-align: center;'>Servicile oferite de My AuTo</h2>";
echo ("<hr>");

$query = "SELECT id, nume_serviciu, durata_estimata, pret, observatii_mecanic FROM servicii";
$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) > 0) {
    echo "<div class='container'>";
    echo "<div class='content'>";
    echo '<table>';
    echo '<thead>';
    echo '<tr>';
    echo '<th>Nume serviciu</th>';
    echo '<th>Durata estimată</th>';
    echo '<th>Pret</th>';
    echo '<th>Observații mecanic</th>';
    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
        echo "<th>Acțiuni</th>";
    }
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $nume_serviciu_id = $row['id'];

        echo '<tr>';
        echo '<td>' . $row['nume_serviciu'] . '</td>';
        echo '<td>' . $row['durata_estimata'] . '</td>';
        echo '<td>' . $row['pret'] . '</td>';
        echo '<td>' . $row['observatii_mecanic'] . '</td>';
        if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
            echo "<td><a href='sterge_servicii.php?id=$nume_serviciu_id' class='button' style='background-color: firebrick; color: white;'>Șterge</a></td>";
        }
        echo '</tr>';
    }
    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
    echo '<div style="text-align: center;">';
    echo '<a href="servicii.php" class="button" style="background-color: firebrick; color: white;">Adaugă servicii noi</a>';
    echo '</div>';}
    

    echo '</tbody>';
    echo '</table>';
    echo "</div>";
    echo "</div>";
}

?>

</body>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>
</body>

</html>