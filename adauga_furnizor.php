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
            padding: 16px;
            background-color: white;
        }

        .form {
            margin: 0px;
            width: 100%;
            display: flex;
        }

        .btn {
            background-color: firebrick;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .label {
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            padding: 5px 10px;
            margin-bottom: 10px;
            display: flex;
        }

        h2 {
            color: #FFF;
            font-size: 17px;
            margin-bottom: 30px;
        }

        input[type=text],
        input[type=email],
        input[type=datetime-local],
        select,
        textarea {
            width: 30%;
            padding: 20px;
            margin: 5px 0 22px 0;
            display: flex;
            border: none;
            background: #f1f1f1;
        }

        input {
            background: #f1f1f1;
            color: #333;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include('headerlogged.php');

    $db = mysqli_connect("localhost:3307", "root", "", "my_auto");
    if (!$db) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $nume_furnizor = $telefon = $email = $adresa = $observati = "";

    if ((isset($_POST["nume_furnizor"])) && (isset($_POST["telefon"])) && (isset($_POST["email"])) && (isset($_POST["adresa"])) && (isset($_POST['observati']))) {


        $nume_furnizor = $_POST['nume_furnizor'];
        $telefon = $_POST['telefon'];
        $email = $_POST['email'];
        $adresa = $_POST['adresa'];
        $observati = $_POST['observati'];

        $query = "INSERT INTO furnizori (nume_furnizor, telefon, email, adresa, observati) VALUES ('$nume_furnizor', '$telefon', '$email', '$adresa', '$observati')";

        if (mysqli_query($db, $query)) {
            echo "Furnizorul a fost adăugat cu succes.";

            exit();
        } else {
            echo "A apărut o eroare la adăugarea furnizorului.";
        }
    }


    mysqli_close($db);


    ?>

    <div class="container">
        <center>
            <h2 style="color: firebrick;">Adăugați un furnizor nou</h2>

            <hr>
            <div class="container">
                <form method="POST" action="adauga_furnizor.php">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">

                    <label for="nume_furnizor">Nume furnizor:</label>
                    <input type="text" name="nume_furnizor" value="<?php echo $nume_furnizor; ?>" required>

                    <label for="telefon">Număr de telefon:</label>
                    <input type="text" name="telefon" value="<?php echo $telefon; ?>" required>

                    <label for="email">Email:</label>
                    <input type="text" name="email" value="<?php echo $email; ?>" required>

                    <label for="adresa">Adresa:</label>
                    <input type="text" name="adresa" value="<?php echo $adresa; ?>" required>

                    <label for="observati">Date despre client:</label>
                    <input type="text" name="observati" value="<?php echo $observati; ?>" required>

                    <input type="submit" class="btn" value="Adaugă">

                </form>
            </div>

        </center>
        <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
        <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
        <script>
            $(document).foundation();
        </script>
</body>

</html>