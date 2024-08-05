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

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
        }

        .content {
            width: 500px;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input[type="text"],
        {
        width: 250px;
        padding: 5px;
        border: 1px solid #ccc;
        align: center;
        margin-left: auto;
        margin-right: auto;
        }


        form {
            text-align: center;
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
   

        $db = mysqli_connect("localhost:3307", "root", "", "my_auto");

        if (!$db) {
            die("Conectarea la baza de date a eșuat: " . mysqli_connect_error());
        }

        // Verificăm dacă formularul a fost trimis
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Preia valorile trimise prin formular
            $nume_serviciu = $_POST["nume_serviciu"];
            $durata_estimata = $_POST["durata_estimata"];
            $pret = $_POST["pret"];
            $observatii_mecanic = $_POST["observatii_mecanic"];

            // Inserare serviciu în tabela "servicii"
            $insertQuery = "INSERT INTO servicii (nume_serviciu, durata_estimata, pret, observatii_mecanic) VALUES ('$nume_serviciu', '$durata_estimata', '$pret', '$observatii_mecanic')";
            if (mysqli_query($db, $insertQuery)) {
                echo "Serviciul a fost adăugat cu succes.";
            } else {
                echo "Eroare la adăugarea serviciului în baza de date: " . mysqli_error($db);
            }
        }

        mysqli_close($db);
   
    ?>
    <br>
    <div class="container">
        <div class="content">
            <h1 style="color: firebrick; text-align: center;">Adaugă servicii</h1><br>

            <form method="POST" action="servicii.php">
                <label for="nume_serviciu">Nume serviciu:</label>
                <input type="text" name="nume_serviciu" required><br>

                <label for="durata_estimata">Durata estimată:</label>
                <input type="text" name="durata_estimata" required><br>

                <label for="pret">Preț:</label>
                <input type="text" name="pret" required><br>

                <label for="observatii_mecanic">Observații mecanic:</label>
                <input name="observatii_mecanic" type="text"></input><br>

                <input type="submit" class="btn" value="Adăugare serviciu">
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>