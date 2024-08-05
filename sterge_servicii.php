<?php
session_start();
include('headerlogged.php');

if ($_SESSION['rol'] == 'Mecanic' && isset($_GET['id'])) {
    $db = mysqli_connect("localhost:3307", "root", "", "my_auto");

    $id = $_GET['id'];

    // Perform the deletion query
    $result = mysqli_query($db, "DELETE FROM servicii WHERE id = $id");

    if ($result) {
        echo "Serviciul a fost ștears cu succes.";
        header("Location: servici_pret.php");
        exit();
    } else {
        echo "Eroare la ștergere: " . mysqli_error($db);
    }
} else {
    // Redirect to an error page or display an error message
    header("Location: error.php");
    exit();
}
?>