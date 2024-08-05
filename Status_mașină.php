<!DOCTYPE html>
<html>

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


        body {
            font-family: Arial, Helvetica, sans-serif;
        }

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

        .car-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 20px;
            font-size: 25px;
            color: firebrick;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    include('headerlogged.php');
    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'utilizator') {
        $db = mysqli_connect("localhost:3307", "root", "", "my_auto");

        if (isset($_GET['nr_inmatriculare'])) {
            $nr_inmatriculare = $_GET['nr_inmatriculare'];

            $query = "SELECT COUNT(*) FROM programare WHERE nr_inmatriculare = '$nr_inmatriculare'";
            $result = mysqli_query($db, $query);

            if ($result) {
                $row = mysqli_fetch_array($result);
                $count = $row[0];
                if ($count > 0) {
                    header("Location: Mașina_mea.php?nr_inmatriculare=" . $nr_inmatriculare);
                    exit();
                } else {
                    echo "Nu există o mașină înregistrată cu acest număr de înmatriculare.";
                }
            } else {
                echo 'Eroare la interogarea bazei de date: ' . mysqli_error($db);
            }
        }

    }
    ?>
    <br>
    <div class="container">
        <div class="content" align="center">
            <h2 style="color: firebrick;">Verificare status mașină</h2><br>
            <form method="GET" action="Mașina_mea.php">
                <label for="nr_inmatriculare">Număr de înmatriculare:</label>
                <input type="text" name="nr_inmatriculare" id="nr_inmatriculare">
                <div class="car-buttons"><br>
                    <input type="submit" class="button" style="background-color: firebrick; color: white;"
                        value="Caută">
                </div>
            </form>
        </div>
        
    </div>
    <?php include('footer.php') ?>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>

</body>

</html>