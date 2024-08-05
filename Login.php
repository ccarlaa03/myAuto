<!doctype html>
<html class="no-js" lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My AuTo</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="icon" type="images/icon"
        href="https://previews.123rf.com/images/tatianasun/tatianasun1705/tatianasun170500025/77826881-auto-mechanic-car-service-repair-and-maintenance-work-icons-set-isolated-vector-illustration.jpg" />
    <link rel="stylesheet" href="./css/global.css">
</head>
<style>
    @media screen and (max-width: 39.9375em) {}

    @media screen and (min-width: 40em) {}

    @media screen and (min-width: 40em) and (max-width: 63.9375em) {}

    @media screen and (min-width: 64em) {}

    @media screen and (min-width: 64em) and (max-width: 74.9375em) {}

    body {
        font-family: Arial, Helvetica, sans-serif;
    }

    input[type="text"],
    input[type="password"] {
        width: 250px;
        padding: 5px;
        border: 1px solid #ccc;
        align: center;
        margin-left: auto;
        margin-right: auto;
    }

    .btn {
        background-color: firebrick;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width: 250px;
    }

    button:hover {
        opacity: 0.8;
    }

    .content {
        width: 500px;
        padding: 30px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .content {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
    }

    @media screen and (max-width: 600px) {
        .content {
            max-width: 100%;
            padding: 10px;
        }
    }
</style>


<body>
    <?php
    session_start();

    include('headerlogged.php');


    $mysqli = new mysqli('localhost:3307', 'root', '', 'my_auto') or die(mysqli_error($mysqli));


    if (isset($_POST['nume']) && isset($_POST['parola'])) {
        $nume = $_POST['nume'];
        $parola = $_POST['parola'];

        $stmt = $mysqli->prepare("SELECT * FROM urilizatori WHERE nume = ? AND parola = ?");
        $stmt->bind_param("ss", $nume, $parola);
        $stmt->execute();
        $result_urilizatori = $stmt->get_result();
        $stmt->close();

        $stmt = $mysqli->prepare("SELECT * FROM angajati WHERE nume_angajati = ? AND parola = ?");
        $stmt->bind_param("ss", $nume, $parola);
        $stmt->execute();
        $result_angajati = $stmt->get_result();
        $stmt->close();

        if ($result_urilizatori->num_rows == 1) {
            $row = $result_urilizatori->fetch_assoc();
            $_SESSION['nume'] = $row['nume'];
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['adresa'] = $row['adresa'];
            $_SESSION['telefon'] = $row['telefon'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['message'] = "SUCCESS";
            $_SESSION['logged_in'] = true;
            $_SESSION['active_tab'] = 'index';

            redirectBasedOnRole($_SESSION['rol']);
        } elseif ($result_angajati->num_rows == 1) {
            $row = $result_angajati->fetch_assoc();
            $_SESSION['nume_angajati'] = $row['nume_angajati'];
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['adresa'] = $row['adresa'];
            $_SESSION['telefon'] = $row['telefon'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['message'] = "SUCCESS";
            $_SESSION['logged_in'] = true;
            $_SESSION['active_tab'] = 'index';

            redirectBasedOnRole($_SESSION['rol']);
        } else {

            header("Location: Login.php?message=Nume de utilizator sau parolă incorecte.");
            exit();
        }
    }

    function redirectBasedOnRole($rol)
    {
        switch ($rol) {
            case 'admin':
                header("Location: Cont_admin.php");
                break;
            case 'utilizator':
                header("Location: Contul_meu.php");
                break;
            case 'Mecanic':
                header("Location: Cont_mecanic.php");
                break;
            default:
                $_SESSION['message'] = "Rolul nu este valid.";
                header("Location: headerlogged.php?message=Rolul nu este valid");
                break;
        }
        exit();
    }
    ?>
    <br>
    <center>

        <form action="Login.php" method="POST">
            <div class="content">
                <h2 style="color: firebrick;">Intră în cont</h2>
                <label for="nume"><b>Numele de utilizator</b></label>
                <input type="text" placeholder="Numele de utilizator" name="nume" required>

                <label for="parola"><b>Parolă</b></label>
                <input type="password" placeholder="Parola" name="parola" required>


                <button type="submit" class="btn"> Login</button>

                <label>
                    <input type="checkbox" name="remember"> Ține minte numele de utilizator.<br>
                    <input type="checkbox" checked="checked" name="remember"> Ține minte parola.<br>

                    <p>Nu ai un cont? <a href="Cont_nou.php">Creează-ți unul acum</a>.</p>
                </label>
            </div>

        </form>
    </center>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</body>

</html>