<?php
session_start();

$db = mysqli_connect("localhost:3307", "root", "");
mysqli_select_db($db, "my_auto");

$id = $_GET['id'];

$query = "DELETE FROM sarcini_mecanici WHERE programare_id = $id;
          DELETE FROM programare WHERE id = $id";

if (mysqli_multi_query($db, $query)) {
    echo "Înregistrările au fost șterse cu succes.";
    header("Location: Programări_clenti_adm.php");
    exit();
} else {
    echo "Eroare la ștergerea înregistrărilor: " . mysqli_error($db);
}

$result = mysqli_query($db, "DELETE FROM angajati WHERE id = $id");

if ($result) {
    echo "Înregistrarea din tabela 'angajati' a fost ștearsă cu succes.";
    header("Location: Lista_conturi_adm_ang.php");
    exit();
} else {
    echo "Eroare la ștergerea înregistrării din tabela 'angajati': " . mysqli_error($db);
}

mysqli_close($db);
?>
