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
        .btn {
            background-color: firebrick;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
<?php
session_start();
include('headerlogged.php');

if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') {
    $db = mysqli_connect("localhost:3307", "root", "", "my_auto");
    if (!$db) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $nume = $_POST['nume'];
        $timp = $_POST['data_ora_programare'];
        $marca_masina = $_POST['marca_masina'];
        $serie_sasiu = $_POST['serie_sasiu'];
        $nr_inmatriculare = $_POST['nr_inmatriculare'];

        $status = $_POST['status'];

        if (empty($nume) || empty($timp) || empty($marca_masina) || empty($serie_sasiu) || empty($nr_inmatriculare)  || empty($status)) {
            echo "Toate câmpurile trebuie completate.";
        } else {
            $query = "UPDATE programare SET nume='$nume', data_ora_programare='$timp', marca_masina='$marca_masina', serie_sasiu='$serie_sasiu', nr_inmatriculare='$nr_inmatriculare',  status='$status' WHERE id=$id";


            if (mysqli_query($db, $query) && mysqli_query($db, $query)) {
                echo "Programarea a fost actualizată cu succes.";
                header("Location: Programări_masini_service_adm.php");
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
        $nume = $row['nume'];
        $timp = $row['data_ora_programare'];
        $marca_masina = $row['marca_masina'];
        $serie_sasiu = $row['serie_sasiu'];
        $nr_inmatriculare = $row['nr_inmatriculare'];
        $status = $row['status'];

    }
}
?>


    </br></br>
    <h2>Editare programare</h2>
    <div class="container">
        <form method="POST" action="editare_mas_service.php">
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <label for="nume">Nume client:</label>
            <input type="text" name="nume" value="<?php echo $nume; ?>" required>

            <label for="data_ora_programare">Data și ora programării:</label>
            <input type="datetime-local" name="data_ora_programare" value="<?php echo $timp; ?>" required>

            <label for="marca_masina">Marca mașinii:</label>
            <input type="text" name="marca_masina" value="<?php echo $marca_masina; ?>" required>

            <label for="serie_sasiu">Serie șasiu:</label>
            <input type="text" name="serie_sasiu" value="<?php echo $serie_sasiu; ?>" required>

            <label for="nr_inmatriculare">Număr înmatriculare:</label>
            <input type="text" name="nr_inmatriculare" value="<?php echo $nr_inmatriculare ?>" required>


            <label for="status">Status lucrare:</label>
            <select name="status" required>
                <option value="În așteptare" <?php if ($status == 'În așteptare')
                    echo 'selected'; ?>>În așteptare
                </option>
                <option value="În curs de lucru" <?php if ($status == 'În curs de lucru')
                    echo 'selected'; ?>>În curs de
                    lucru</option>
                <option value="Finalizată" <?php if ($status == 'Finalizată')
                    echo 'selected'; ?>>Finalizată</option>
            </select>


            <input type="submit" name="update" class="btn" value="Actualizează">
        </form>

    </div>
</body>



<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
<script>
    $(document).foundation();
</script>


</html>