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

        .c-select {
            width: 60%;
            padding: 10px;
        }

        .label {
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            padding: 5px 10px;
            margin-bottom: 10px;
            display: flex;
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

        input[type="text"],
        input[type="email"],
        input[type=datetime-local],
        input[type="file"],
        select {
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
    </style>
</head>

<?php
session_start();
include('headerlogged.php');

if (!isset($_SESSION['rol']) || ($_SESSION['rol'] != 'utilizator' && $_SESSION['rol'] != 'admin')) {
    echo "Trebuie să ai un cont pentru a putea face o programare.";
    exit;
}

$db = mysqli_connect("localhost:3307", "root", "", "my_auto");

if (!$db) {
    die("Conectarea la baza de date a eșuat: " . mysqli_connect_error());
}

if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'utilizator') {
    // Verificați dacă formularul a fost trimis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nume = $_POST['nume'];
        $email = $_POST['email'];
        $telefon = $_POST['telefon'];
        $adresa = $_POST['adresa'];
        $data_ora_programare = $_POST['data_ora_programare'];
        $status = "În așteptare";
        $nr_inmatriculare = $_POST['nr_inmatriculare'];
        $serie_sasiu = $_POST['serie_sasiu'];
        $marca_masina = $_POST['marca_masina'];
        $nume_angajati = $_POST['nume_angajati'];
        $imagine_daune = '';
        $nume_serviciu = $_POST['nume_serviciu'];

        // Interogare pentru a obține ID-ul serviciului
        $interogareServiciu = "SELECT id FROM servicii WHERE nume_serviciu = '$nume_serviciu'";
        $resultatServiciu = mysqli_query($db, $interogareServiciu);
        if ($row = mysqli_fetch_assoc($resultatServiciu)) {
            $serviciu_id = $row['id'];
        } else {
            echo "Serviciul specificat nu există în baza de date.";
            exit;
        }


        // Verifică dacă programarea se suprapune cu altele existente
        $verificareSql = "SELECT * FROM programare WHERE data_ora_programare = '$data_ora_programare'";
        $rezultat = mysqli_query($db, $verificareSql);

        $destinatie = __DIR__ . "/imagini_daune/" . $imagine_daune;
        // Procesați fișierul încărcat
        if (isset($_FILES['imagine_daune'])) {
            $imagine_daune = $_FILES["imagine_daune"]["name"];
            $tempname = $_FILES["imagine_daune"]["tmp_name"];

            if (move_uploaded_file($tempname, $destinatie)) {
                // Fișierul a fost încărcat cu succes, puteți continua cu restul codului
            }
        }

        if (mysqli_num_rows($rezultat) > 0) {
            echo "Programarea selectată se suprapune cu o altă programare existentă.";
        } elseif (!isWorkingHour($data_ora_programare)) {
            echo "Programarea dvs. trebuie să fie între orele 08:00 și 17:00.";
        } elseif (isWeekend($data_ora_programare)) {
            echo "Programările nu pot fi efectuate în weekend (sâmbătă sau duminică).";
        } else {
            // Inserare programare în tabelul "programare"
            $programareSql = "INSERT INTO programare (nume, data_ora_programare, status, marca_masina, nr_inmatriculare, serie_sasiu, imagine_daune) VALUES ('$nume', '$data_ora_programare', '$status', '$marca_masina', '$nr_inmatriculare', '$serie_sasiu', '$imagine_daune')";
            if (mysqli_query($db, $programareSql)) {
                $programare_id = mysqli_insert_id($db);

                // Inserare sarcină mecanicului
                $insertQuery = "INSERT INTO sarcini_mecanici (nume_angajati, servicii_id, programare_id) VALUES ('$nume_angajati', '$serviciu_id', '$programare_id')";

                if (!empty($insertQuery) && mysqli_query($db, $insertQuery)) {
                    echo "Programarea a fost trimisă cu succes. Un coleg o să vă contacteze pentru confirmarea programării.";
                } else {
                    echo "Eroare la adăugarea datelor în tabela 'sarcini_mecanici': " . mysqli_error($db);
                }
            } else {
                echo "Eroare la adăugarea datelor în tabela 'programare': " . mysqli_error($db);
            }
        }
    } else {
        $query = "SELECT nume_serviciu FROM servicii";
        $result = mysqli_query($db, $query);
    }
} else {
    echo "Nu aveți privilegiile necesare pentru a accesa această pagină.";
}

mysqli_close($db);

// Funcție pentru a verifica dacă ora specificată este între 08:00 și 17:00
function isWorkingHour($data_ora)
{
    $ora = date("H:i", strtotime($data_ora));
    return ($ora >= "08:00" && $ora <= "17:00");
}

// Funcție pentru a verifica dacă data specificată este în weekend (sâmbătă sau duminică)
function isWeekend($data_ora)
{
    $ziua_saptamanii = date("N", strtotime($data_ora));
    return ($ziua_saptamanii == 6 || $ziua_saptamanii == 7);
}
?>



<body>
    <br>
    <div class="container">
        <div class="content">
            <center>
                <h1 style="color: firebrick;">Programare</h1>
                <hr>
                <form method="POST" action="Programare.php" enctype="multipart/form-data">


                    Nume: <input type="text" name="nume" required><br>
                    Email: <input type="email" name="email" required><br>
                    Telefon: <input type="text" name="telefon" required><br>
                    Adresă: <input type="text" name="adresa" required><br>
                    Data și ora programării: <input type="datetime-local" name="data_ora_programare" required><br>
                    Număr înmatriculare: <input type="text" name="nr_inmatriculare" required><br>
                    Serie șasiu: <input type="text" name="serie_sasiu" required><br>
                    <label for="marca_masina">Vă rugăm să alegeți marca mașinii:</label><br>
                    <select name="marca_masina" id="marca_masina" class="c-select">
                        <option value="Volvo">Volvo</option>
                        <option value="Mercedes-Benz">Mercedes-Benz</option>
                        <option value="Volkswagen">Volkswagen</option>
                        <option value="Audi">Audi</option>
                        <option value="BMW">BMW</option>
                    </select><br>
                    <label for="nume_angajati">Vă rugăm să selectați mecanicul, în funcție de marca
                        mașinii:</label><br>
                    <select name="nume_angajati" id="nume_angajati" class="c-select">
                        <option value="Nagy Remus">Nagy Remus - Volvo</option>
                        <option value="Sas George">Sas George - Mercedes-Benz</option>
                        <option value="Dumitrescu Ionuț">Dumitrescu Ionuț - Volkswagen</option>
                        <option value="Pop Richard">Pop Richard - Audi</option>
                        <option value="Matei David">David Matei - BMW</option>
                    </select><br>
                    <label for="nume_serviciu">Serviciu:</label>
                    <select name="nume_serviciu" id="nume_serviciu" class="c-select">
                        <option value="">Alege un serviciu</option>
                        <?php
                        $nume_serviciu = array(
                            "Schimbare de ulei si filtre",
                            "Schimbare de placute frana",
                            "Reparatii cutii de viteze",
                            "Reparatii motoare",
                            "Reparatii casete de directie",
                            "Inlocuire kit de ambreiaj",
                            "Reparatii alternatoare",
                            "Inlocuire de anvelope si echilibrari"
                        );
                        foreach ($nume_serviciu as $nume_serviciu) {
                            echo '<option value="' . $nume_serviciu . '">' . $nume_serviciu . '</option>';
                        }
                        ?>
                    </select>
                    <label for="imagine_daune">Imagine daune:</label>
                    <input type="file" name="imagine_daune" id="imagine_daune" accept="image/*"><br>

                    <input type="submit" class="button" style="background-color: firebrick; color: white;"
                        value="Trimite">

                </form>
            </center>

            <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
            <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
            <script>
                $(document).foundation();

            </script>

</body>

</html>