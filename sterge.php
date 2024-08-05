<?php
session_start();

if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
    $db = mysqli_connect("localhost:3307", "root", "");
    mysqli_select_db($db, "my_auto");

    $id = $_GET['id'];

    // Ștergeți rândurile asociate din tabelul "sarcini_mecanici"
    $result1 = mysqli_query($db, "DELETE FROM sarcini_mecanici WHERE programare_id = $id");

    // Ștergeți rândul din tabelul "programare"
    $result = mysqli_query($db, "DELETE FROM programare WHERE id = $id");

    if ($result && $result1) {
        echo "Sarcina a fost ștearsă cu succes.";
        header("Location: Mecanici.php");
        exit();
    } else {
        echo "Eroare la ștergere: " . mysqli_error($db);
    }
} else {
    echo "Nu aveți permisiunea de a accesa această pagină.";
} 
?>
