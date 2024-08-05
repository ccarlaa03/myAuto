<?php
session_start();

if (isset($_SESSION['rol']) && ($_SESSION['rol'] == 'admin' || $_SESSION['rol'] == 'Mecanic')) {
    $db = mysqli_connect("localhost:3307", "root", "", "my_auto");

    if (!$db) {
        die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
    }

    if (isset($_POST['recenzii'])) {
        $recenzii_selectate = $_POST['recenzii'];

        foreach ($recenzii_selectate as $recenzie_id) {
            $query = "DELETE FROM recenzii WHERE id = $recenzie_id";
            $result = mysqli_query($db, $query);

            if (!$result) {
                echo "Eroare la ștergere: " . mysqli_error($db);
                exit();
            }
        }

        echo "Recenziile au fost șterse cu succes.";
        header("Location: Cont_admin.php");
        exit();
    }

    mysqli_close($db);
} else {
    echo "Nu aveți permisiunea de a accesa această pagină.";
}
?>
