<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My AuTo - Contul meu</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="icon" type="image/icon"
        href="https://previews.123rf.com/images/tatianasun/tatianasun1705/tatianasun170500025/77826881-auto-mechanic-car-service-repair-and-maintenance-work-icons-set-isolated-vector-illustration.jpg" />
    <link rel="stylesheet" href="./css/global.css">

    <style>
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
            width: 400px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        form {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include('headerlogged.php');

    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'utilizator') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $db = mysqli_connect("localhost:3307", "root", "", "my_auto");
            $nume_angajati = $_POST['nume_angajati'];
            $comentariu = $_POST['comentariu'];
            $rating = $_POST['rating'];
            $intrebare1 = $_POST['intrebare1'];
            $intrebare2 = $_POST['intrebare2'];
            $intrebare3 = $_POST['intrebare3'];

            $query = "INSERT INTO recenzii (nume_angajati, comentariu, rating, intrebare1, intrebare2, intrebare3) VALUES ('$nume_angajati', '$comentariu', '$rating', '$intrebare1', '$intrebare2', '$intrebare3')";
            $result = mysqli_query($db, $query);
            if ($result) {
                echo '<p style="color: green; text-align: center;">Recenzia a fost adăugată cu succes. Vă mulțumim pentru timpul acordat!</p>';
            } else {
                echo '<p style="color: red; text-align: center;">Eroare la adăugarea recenziei. Vă rugăm să încercați din nou.</p>';
            }
            header("Location:Contul_meu.php");
        }
    }
    ?>

    <div class="container">
        <div class="content">
            <h2 style="color: firebrick;" align="center">Adaugă o recenzie</h2>
            <hr>
            <form action="Recenzie_util.php" method="POST">
                <label for="nume">Numele dumneavoastră:</label>
                <input type="text" name="nume" required><br>

                <label for="nume_angajati">Numele angajatului cu care ați lucrat:</label>
                <input type="text" name="nume_angajati" required><br>

                <label for="rating">Cât de mulțumit ați fost de serviciile noastre?</label>
                <input type="number" name="rating" min="1" max="5" required><br>

                <label for="intrebare1">V-ați simțit tratat cu respect și atenție de către personalul atelierului auto?</label>
                <input type="text" name="intrebare1"><br>

                <label for="intrebare2">Ați recomanda acest atelier auto altor persoane?</label>
                <input type="text" name="intrebare2"><br>

                <label for="intrebare3">Aveți sugestii de îmbunătățire pentru atelierul auto?</label>
                <input type="text" name="intrebare3"><br>

                <label for="comentariu">Evaluarea dumneavoastră:</label>
                <input type="text" name="comentariu" required><br>

                <input type="submit" class="button" style="background-color: firebrick; color: white;"
                        value="Adaugă o recenzie">
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
