<!doctype html>
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
            text-align: center;
            color: firebrick;
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
</head>

<body>

    <?php
    session_start();
    include('headerlogged.php');
    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
        $db = mysqli_connect("localhost:3307", "root", "");
        mysqli_select_db($db, "my_auto");

        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $timp = $_POST['data_ora_programare'];
            $marca_masina = $_POST['marca_masina'];
            $serie_sasiu = $_POST['serie_sasiu'];
            $nr_inmatriculare = $_POST['nr_inmatriculare'];
            $nume_serviciu = $_POST['descriere'];
            $status = $_POST['status'];
            $durata_estimata = $_POST['durata_estimata'];
            $pret = $_POST['cost_rep'];

            if (empty($timp) || empty($marca_masina) || empty($serie_sasiu) || empty($nr_inmatriculare) || empty($nume_serviciu) || empty($status) || empty($durata_estimata) || empty($pret)) {
                echo "Toate câmpurile trebuie completate.";
            } else {
                $query = "UPDATE programare SET data_ora_programare='$timp', marca_masina='$marca_masina', serie_sasiu='$serie_sasiu', nr_inmatriculare='$nr_inmatriculare',  status='$status' WHERE id=$id";

                $query_cost = "UPDATE servicii SET pret='$pret' , durata_estimata='$durata_estimata', nume_serviciu='$nume_serviciu' WHERE programare_id=$id";

                if (mysqli_query($db, $query) && mysqli_query($db, $query_cost)) {
                    echo "Programarea a fost actualizată cu succes.";
                    header("Location: Mecanici.php");
                    exit();
                } else {
                    echo "A apărut o eroare la actualizare.";
                }
            }
        }


        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $result = mysqli_query($db, "SELECT * FROM programare WHERE id='$id'");
            $row = mysqli_fetch_assoc($result);
            // Extrageți informațiile necesare despre programare din $row
            $timp = $row['data_ora_programare'];
            $marca_masina = $row['marca_masina'];
            $serie_sasiu = $row['serie_sasiu'];
            $nr_inmatriculare = $row['nr_inmatriculare'];
            $status = $row['status'];
        }

        // Efectuați verificarea pentru existența variabilei înainte de utilizare
        if (isset($id)) {
            $result_cost = mysqli_query($db, "SELECT pret, nume_serviciu, durata_estimata FROM servicii WHERE id = '$id'");
            if (mysqli_num_rows($result_cost) > 0) {
                $row_cost = mysqli_fetch_assoc($result_cost);
                // Extrageți informațiile necesare despre serviciu sau cost din $row_cost
                $pret = $row_cost['pret'];
                $nume_serviciu = $row_cost['nume_serviciu'];
                $durata_estimata = $row_cost['durata_estimata'];
            }
        }
    }

    ?>



    <h2 style="color: firebrick;">Editare </h2>
    <hr>
    <div class="container">
        <form method="POST" action="editare.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="data_ora_programare">Data și ora programării:</label>
            <input type="datetime-local" name="data_ora_programare" value="<?php echo $timp; ?>" required>

            <label for="marca_masina">Marca mașinii:</label>
            <input type="text" name="marca_masina" value="<?php echo $marca_masina; ?>" required>

            <label for="serie_sasiu">Serie șasiu:</label>
            <input type="text" name="serie_sasiu" value="<?php echo $serie_sasiu; ?>" required>

            <label for="nr_inmatriculare">Număr înmatriculare:</label>
            <input type="text" name="nr_inmatriculare" value="<?php echo $nr_inmatriculare; ?>" required>

            <label for="nume_serviciu">Descriere:</label>
            <textarea name="nume_serviciu" required><?php echo $nume_serviciu ?></textarea>

            <label for="pret">Costuri:</label>
            <textarea name="pret" required><?php echo $pret; ?></textarea>

            <label for="durata_estimata">Durată estimată:</label>
            <textarea name="durata_estimata" required><?php echo $durata_estimata; ?></textarea>

            <label for="status">Status lucrare:</label>
            <select name="status" required>
                <option value="În așteptare" <?php if ($status == 'În așteptare')
                    echo 'selected'; ?>>În așteptare
                </option>
                <option value="În curs de lucru" <?php if ($status == 'În curs de lucru')
                    echo 'selected'; ?>>În curs
                    de
                    lucru</option>
                <option value="Finalizată" <?php if ($status == 'Finalizată')
                    echo 'selected'; ?>>Finalizată</option>
            </select>

            <input type="submit" name="update" value="Actualizează">
        </form>
    </div>
</body>



<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>
</body>

</html>