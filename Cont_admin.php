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
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link rel="stylesheet" href="./css/global.css">
    <style type="text/css">
        @media screen and (max-width: 39.9375em) {}

        @media screen and (min-width: 40em) {}

        @media screen and (min-width: 40em) and (max-width: 63.9375em) {}

        @media screen and (min-width: 64em) {}

        @media screen and (min-width: 64em) and (max-width: 74.9375em) {}

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            width: 100vw;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
        }

        .content {
            width: 500px;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border: 2px solid firebrick;
        }

        @media only screen and (max-width: 600px) {
            .container {
                align-items: center;

            }

            .content {
                width: 90%;
                max-width: 400px;

            }
        }
    </style>
</head>
<?php
session_start();

include('headerlogged.php');

?>

<body>
    <br>
    <div class="container">
        <div class="content">
            <h2>Bun venit, Carla!</h2>
            <p>Nume: <strong> Chereji Carla</strong></p>
            <P>Număr de telefon: <strong> 0749413938 </strong></p>
            <p>Email: <strong>chereji.carlaa03@gmail.com</strong></p>
            <p>Adresă: <strong>Strada Mihai Viteazu nr. 64, Seini</strong></p>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
        $('.dropdown').foundation();
    </script>
</body>

</html>