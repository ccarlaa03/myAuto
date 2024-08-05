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


    @media (max-width: 600px) {
        .top-bar {
            display: flex;
            width: 100%;
            text-align: center;
            font-size: 4.5px;
            padding: 4.5px;
        }
    }


    @media (min-width: 641px) and (max-width: 1024px) {

        .top-bar {
            display: block;
            font-size: 9px;
            padding: 9px;
            width: 100%;
        }
    }
</style>


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My AuTo</title>
    <link rel="stylesheet" href="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/motion-ui@1.2.3/dist/motion-ui.min.css" />
    <link rel="stylesheet" href="css/app.css">
</head>
<header id="header" class="top-bar">

    <div class="top-bar align-items-center">
        <nav id="top-bar">
            <ul>
                <?php if (!isset($_SESSION['rol'])): ?>
                    <li><a class="top-bar" href="home.php">Home</a></li>
                    <li><a class="top-bar" href="servici_pret.php">Servicii</a></li>
                    <li><a class="top-bar" href="Contact.php">Contact</a></li>
                    <li><a class="top-bar" href="Despre%20noi.php">Despre noi</a></li>
                    <li><a class="top-bar" href="login.php">Log In</a></li>
                <?php else: ?>

                    <li><a class="top-bar" href="logout.php">Log Out</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>


</header>