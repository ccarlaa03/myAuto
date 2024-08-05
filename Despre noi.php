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

    .header img {
      float: left;
      width: 70px;
      height: 65px;
      background: #555;
    }

    .header h1 {
      position: relative;
      top: 10px;
      left: 10px;
      color: firebrick;
    }

    header {
      width: 100vw;
    }

    .header-right {
      text-align: right;
      top: 25px;
      right: 30px;
      position: absolute;
    }

    .material-icons {
      position: absolute;
    }

    .form {
      margin: 0px;
      width: 210px;
      display: flex;
    }

    .input[type="text"] {
      color: #333;
      font-size: 16px;
      display: flex;
    }

    .label {
      background-color: #f1f1f1;
      border: 1px solid #ccc;
      padding: 5px 10px;
      margin-bottom: 10px;
      display: flex;
    }

    .textcontainer {
      background-color: whitesmoke 200px;
      border: 20px solid firebrick;
      padding: 15px;
      text-align: center;
    }

    h2 {
      color: #FFF;
      font-size: 17px;
      margin-bottom: 30px;
    }
  </style>
</head>

<body>
  <div class="header">
    <h1><img src="https://i.pinimg.com/736x/98/8d/20/988d2004483746981f41f4db8444e59a.jpg" alt="logo" />My AuTo</h1>
  </div>
  <?php 
  session_start();
  include('headerlogged.php');

  ?>
  <div class="header-right">
    <a href="Programare.html">Programează o vizită acum &nbsp; <i class="material-icons">date_range</i></a>
  </div>

  <div class="textcontainer">
    <img src="https://www.shutterstock.com/image-vector/cheerful-team-auto-mechanics-against-260nw-1957803811.jpg"
      align="center" />
  </div>
  </div>
  </div>
  <br>
  <h2 align="center">Despre<b> echipa noastră</b>:</h2>
  <br>
  <div class="row">
    <div class="medium-4 columns">
      <h3 style="color:firebrick"><ins>Cine suntem noi:</ins></h3>
      <p> Noi suntem o echipă de mecanici, pasionați de mașini și de tot ce ține de lumea auto. Fiecare dintre noi
        are abilități și cunoștințe unice, dar avem un obiectiv comun: să fim cei mai buni în ceea ce facem.
        În fiecare zi, ne dedicăm muncii noastre cu pasiune și devotament. În cadrul echipei noastre, fiecare
        persoană
        este importantă și valoroasă, contribuind cu experiența și cunoștințele sale pentru a asigura că
        mașinile
        noastre sunt întotdeauna în stare excelentă.</p>
    </div>
    <div class="medium-4 columns">
      <h3 style="color:firebrick"><ins>Experiență și calificări:</ins></h3>
      <p> Noi suntem mereu deschiși să învățăm lucruri noi și să ne perfecționăm abilitățile.Participăm la cursuri
        și traininguri pentru a ne păstra la curent cu cele mai recente tehnologii și tendințe din domeniu.
        În cele din urmă, ne mândrim cu munca noastră și suntem fericiți să oferim servicii de înaltă calitate
        clienților noștri. De la reparații și întreținere la personalizare și tuning, suntem echipa potrivită
        pentru a
        face mașina ta să meargă perfect.</p>
    </div>
    <div class="medium-4 columns">
      <h3 style="color:firebrick"><ins>Confortul oferit:</ins></h3>
      <p> Suntem conștienți de faptul că timpul și confortul clienților noștri sunt foarte importanți. De aceea,
        oferim servicii
        rapide și eficiente și, în cazul în care mașina dumneavoastră trebuie să rămână la atelierul nostru mai
        mult timp, oferim serviciu de transport.
        Dacă clienții așteaptă în timpul reparației, ne asigurăm că au parte de confort și sunt tratați cu
        respect și considerație. Așadar, oferim o zonă de așteptare confortabilă,
        cu acces la internet și cafea gratuită, pentru a face așteptarea cât mai plăcută.</p>
    </div>
  </div>
  <br>
  <hr>

  <?php include 'footer.php'; ?>

  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>