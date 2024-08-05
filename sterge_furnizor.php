<?php
session_start();

if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
    $db = mysqli_connect("localhost:3307", "root", "");
    mysqli_select_db($db, "my_auto");

    $id = $_GET['id'];

    $result = mysqli_query($db, "DELETE FROM furnizori WHERE id = $id");

    if ($result) {
        echo "Furnizorul a fost ștears cu succes.";
        header("Location: furnizori.php");
        exit();
    } else {
        echo "Eroare la ștergere: " . mysqli_error($db);
    }
} else {
    echo "Nu aveți permisiunea de a accesa această pagină.";
}
?>
