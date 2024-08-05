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

        .faq-question {
            font-weight: bold;
            cursor: pointer;
        }

        .faq-answer {
            display: none;
            margin-bottom: 10px;
        }

        .faq-answer.show {
            display: block;
        }
    </style>
</head>

<body>
    <?php
    session_start();
    include('headerlogged.php');

    if (isset($_SESSION['rol']) && ($_SESSION['rol'] == 'utilizator' || $_SESSION['rol'] == 'Mecanic')) {
        $db = mysqli_connect("localhost:3307", "root", "", "my_auto");

        // Obțineți întrebările și răspunsurile din baza de date
        $query = "SELECT id, intrebare, raspuns FROM mesaje";
        $result = mysqli_query($db, $query);
        echo "<h2 style='color: firebrick; text-align: center;'>Întrebări frecvente despre serviciile noastre de atelier auto </h2>";
        echo ("<hr>");

        echo "<table >";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Întrebări</th>";
        echo "<th>Răspunsuri</th>";
        if ($_SESSION['rol'] == 'Mecanic') {
            echo "<th>Acțiuni</th>";
        }
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $intrebare_id = $row['id'];
                $intrebare = $row['intrebare'];
                $raspuns = $row['raspuns'];

                echo "<tr>";
                echo "<td>$intrebare</td>";
                echo "<td>$raspuns</td>";
                if ($_SESSION['rol'] == 'Mecanic') {
                    echo "<td><a href='sterge_faq.php?id=$intrebare_id' class='button' style='background-color: firebrick; color: white;'>Șterge</a></td>";
                }
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='3'>Nu există întrebări frecvente disponibile.</td>";
            echo "</tr>";
        }

        echo "</tbody>";
        echo "</table>";

        mysqli_free_result($result);
    }

    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'utilizator') {
        echo '<div align="center">';
        echo '<a href="creare_faq.php" class="button" style="background-color: firebrick; color: white;">Adaugă o întrebare nouă</a>';
        echo '</div>';
    }

    if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
        echo '<div align="center">';
        echo '<div>';
        echo '<a href="raspuns_faq.php" class="button" style="background-color: firebrick; color: white;">Răspunde la întrebări</a>';
        echo '</div>';

    }
    include('footer.php');
    ?>


    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();

        // Adăugați cod JavaScript pentru gestionarea întrebărilor FAQ
        $(document).ready(function () {
            $(".faq-question").click(function () {
                $(this).next(".faq-answer").toggleClass("show");
            });
        });
    </script>

</body>

</html>