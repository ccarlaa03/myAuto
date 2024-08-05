<!DOCTYPE html>
<html>

<head>
    <style>
        .top-bar {
            display: flex;
            justify-content: center;

        }

        .top-bar ul {
            list-style-type: none;
            margin: 0;
            padding: 0 10px;
            display: flex;

        }

        .top-bar ul li {
            margin-right: 10px;

        }

        .top-bar ul li a {
            color: firebrick;
        }

        @media (max-width: 600px) {
            .top-bar {
                display: flex;
                width: 100%;
                font-size: 5px;
                padding: 5px;
            }
            .ul.menu {
                display: flex;
                width: 100%;
                font-size: 5px;
                padding: 5px;
            }
        }

        @media (min-width: 641px) and (max-width: 1024px) {
            .top-bar {
                display: flex;
                font-size: 15px;
                padding: 9px;
                width: 100%;
            }
        }
    </style>
</head>

<body>


    <?php
    // Conexiunea la baza de date
    $db = mysqli_connect("localhost:3307", "root", "", "my_auto");
    echo ('<div class="top-bar">');
    // Verificați dacă utilizatorul este autentificat și are un rol asignat
    if (!isset($_SESSION["rol"]) || $_SESSION["rol"] == "") {
        // Redirecționează către pagina de autentificare
    
        echo "<ul class=\"menu\">";
        echo "<li><a href=\"home.php\">Home</a></li>";
        echo "<li><a href=\"servici_pret.php\">Servicii</a></li>";
        echo "<li><a href=\"Contact.php\">Contact</a></li>";
        echo "<li><a href=\"Despre%20noi.php\">Despre noi</a></li>";
        echo "<li><a href=\"login.php\">Log In</a></li>";
        echo "</ul>";
    } else {
        // Obțineți rolul utilizatorului din sesiune
        $rol = $_SESSION["rol"];

        // Interogarea pentru a selecta înregistrările din ambele tabele bazate pe rolul utilizatorului
        $query = "SELECT meniu.nume_pagina, meniu.link_pagina
              FROM meniu
              INNER JOIN `permisiuni-actori` ON meniu.nume_pagina = `permisiuni-actori`.nume_pagina
              WHERE meniu.rol = '$rol' AND `permisiuni-actori`.rol = '$rol'
              ORDER BY meniu.nume_pagina ASC"; // Adăugăm clauza ORDER BY pentru a ordona înregistrările
    
        $result = mysqli_query($db, $query);

        // Verificați dacă există înregistrări returnate
        if (mysqli_num_rows($result) > 0) {
            echo "<ul class=\"menu\">";

            // Iterați prin fiecare înregistrare și afișați numele paginilor și link-urile
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li><a href='" . $row["link_pagina"] . "'>" . $row["nume_pagina"] . "</a></li>";
            }

            // Adăugați un element de logout la sfârșitul meniului
            echo "<li><a href=\"logout.php\"><i class=\"fa fa-sign-out\"></i>Logout</a></li>";

            echo "</ul>";
        }
    }
    echo "</div>";

    ?>

</body>

</html>