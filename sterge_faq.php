<?php
session_start();
include('headerlogged.php');
if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
    $db = mysqli_connect("localhost:3307", "root", "", "my_auto");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];


        $query = "DELETE FROM mesaje WHERE id = $id";
        $result = mysqli_query($db, $query);

        if ($result) {
            echo "Întrebarea și răspunsul au fost șterse cu succes.";
            header("Location: FAQ.php");
            exit;
        } else {
            echo "A apărut o eroare la ștergerea întrebării și răspunsului.";
        }
    } else {
        echo "ID-ul întrebării nu a fost furnizat.";
    }

    mysqli_close($db);
} else {
    echo "Nu aveți permisiunea de a accesa această pagină.";
}
?>