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
</head>
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
</style>

<body>
    <?php
    session_start();
    include('headerlogged.php');

    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'utilizator') {

        $db = mysqli_connect("localhost:3307", "root", "", "my_auto");

        if (isset($_POST['intrebare'])) {
            $intrebare = $_POST['intrebare'];


            $query = "INSERT INTO mesaje (intrebare) VALUES ('$intrebare')";

            if (mysqli_query($db, $query)) {
                echo "Întrebarea a fost adăugată cu succes.";
                header("Location: FAQ.php");
                exit;
            } else {
                echo "A apărut o eroare la adăugarea întrebării.";
            }
        }

        mysqli_close($db);
    }
    ?>
    <br>
    <div class="container">
        <div class="content" align="center">
            <h3 style="color: firebrick;">Adăugați o întrebare nouă</h3>
            <br>
            <form method="POST" action="creare_faq.php">
                <label for="intrebare">Întrebare:</label>
                <input type="text" name="intrebare" required>

                <input type="submit" class="button" style="background-color: firebrick; color: white;" value="Trimite">
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