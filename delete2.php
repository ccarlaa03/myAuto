<?php
session_start();

if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') {
    $db = mysqli_connect("localhost:3307", "root", "");
    mysqli_select_db($db, "my_auto");

    $id = $_GET['id'];

    $result = mysqli_query($db, "DELETE FROM urilizatori WHERE id = $id");

    if ($result) {
        echo "Înregistrarea a fost ștearsă cu succes.";
        header("Location: Lista_conturi_admn_util.php");
        exit();
    } else {
        echo "Eroare la ștergerea înregistrării: " . mysqli_error($db);
    }
} else {
    echo "Nu aveți permisiunea de a accesa această pagină.";
}
?>
