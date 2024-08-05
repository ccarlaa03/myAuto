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

        @media screen and (min-width: 64em) and (max-width: 74.9375em) {}

        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table th,
        table td {
            padding: 8px;
            border: 1px solid #ccc;
        }

        @media only screen and (max-width: 600px) {
            table {
                font-size: 9px;
            }
        }
    </style>
</head>


<body>

    <section>

        <?php
        session_start();
        include('headerlogged.php');

        echo ('<br>');
        echo ('<h2 style="color: firebrick;">Istoric mașină</h2>');
        echo ('<hr />');
        if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'Mecanic') {
            $db = mysqli_connect("localhost:3307", "root", "", "my_auto");

            if (isset($_GET['nr_inmatriculare'])) {
                $nr_inmatriculare = $_GET['nr_inmatriculare'];
            
                $query = "SELECT p.nume, p.data_ora_programare, p.status, s.nume_angajati, sv.nume_serviciu, sv.pret AS pret_serviciu
                          FROM programare p
                          LEFT JOIN sarcini_mecanici s ON p.id = s.programare_id
                          LEFT JOIN servicii sv ON s.servicii_id = sv.id
                          WHERE p.nr_inmatriculare = '$nr_inmatriculare'";
            
                $result = mysqli_query($db, $query);
            
                if ($result) {
                    echo '<table style="margin: 0 auto;">';
                    echo '<tr><th>Nume deținător</th><th>Descriere</th><th>Data și ora programării</th><th>Pret serviciu</th><th>Status lucrare</th><th>Nume mecanic</th></tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<tr>';
                        echo '<td>' . $row['nume'] . '</td>';
                        echo '<td>' . $row['nume_serviciu'] . '</td>';
                        echo '<td>' . $row['data_ora_programare'] . '</td>';
                        echo '<td>' . $row['pret_serviciu'] . '</td>';
                        echo '<td>' . $row['status'] . '</td>';
                        echo '<td>' . $row['nume_angajati'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                }
            
                } else {
                    echo 'Eroare la interogarea bazei de date: ' . mysqli_error($db);
                }
            }
        ?>


    </section>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>
</body>

</html>