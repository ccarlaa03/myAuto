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
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400);
    @import url(https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

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

    .header-right {
      text-align: right;
      top: 25px;
      right: 30px;
      position: absolute;
    }

    .material-icons {
      position: absolute;
    }

    .callout {
      padding: 8px;
      width: 100%;

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

    .container {
      width: 400px;
      margin: 0 auto;
      margin-top: 3em;
      background-color: #EFEFEF;
      padding: 4px;
    }

    .inner {
      padding: 1em;
      background-color: white;
      overflow: hidden;
      position: relative;
      -webkit-border-radius: 4px;
      -moz-border-radius: 4px;
      border-radius: 4px;
    }

    .rating {
      float: left;
      width: 45%;
      margin-right: 5%;
      text-align: center;
    }

    .rating-num {
      color: #333333;
      font-size: 72px;
      font-weight: 100;
      line-height: 1em;
    }

    .rating-stars {
      font-size: 20px;
      color: #E3E3E3;
      margin-bottom: .5em;
    }

    .rating-stars .active {
      color: #737373;
    }

    .rating-users {
      font-size: 14px;
    }

    .histo {
      float: left;
      width: 50%;
      font-size: 13px;
    }

    .histo-star {
      float: left;
      padding: 3px;

    }

    .histo-rate {
      width: 100%;
      display: block;
      clear: both;
    }

    .bar-block {
      margin-left: 5px;
      color: black;
      display: block;
      float: left;
      width: 75%;
      position: relative;
    }

    .bar {
      padding: 4px;
      display: block;
    }

    #bar-five {
      width: 1;
      background-color: #9FC05A;
    }

    #bar-four {
      width: 1;
      background-color: #ADD633;
    }

    #bar-three {
      width: 1;
      background-color: #FFD834;
    }

    #bar-two {
      width: 1;
      background-color: #FFB234;
    }

    #bar-one {
      width: 1;
      background-color: #FF8B5A;
    }

    h2 {
      color: #FFF;
      font-size: 17px;
      margin-bottom: 30px;
    }

    .review-table {
      margin: 0 auto;

      max-height: 200px;

      overflow-y: auto;

    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    thead {
      background-color: #f2f2f2;
    }

    th,
    td {
      padding: 4px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .comment-cell {
      width: 70%;
    }

    .rating-cell {
      width: 30%;
    }

    .button.large.hollow {
      background-color: firebrick;
      color: white;
    }

    .header-right a {
      color: firebrick;
    }
  </style>
  <link rel="stylesheet" href="./css/global.css">
</head>

<body>

  <div class="header">
    <h1><img src="https://i.pinimg.com/736x/98/8d/20/988d2004483746981f41f4db8444e59a.jpg" alt="logo" />My AuTo</h1>
  </div>
  <?php

  include('headerlogged.php');
  ?>
  <div class="header-right">
    <a href="Programare.php">Programează o vizită acum &nbsp; <i class="material-icons">date_range</i></a>
  </div>


  <div class="callout large">
    <div class="row column text-center">
      <h1><i>Nu vei avea pană de cauciuc atâta timp cât roata ta de rezervă este de la noi.</i></h1><br>
      <a href="Programare.php" class="button large hollow">Programează-te </a>
    </div>
  </div>
  </br></br></br>
  <div class="row column text-center">
    <div class="photo">
      <img class="thumbnail" src="https://www.autovit.ro/blog/wp-content/uploads/2020/04/revizie-auto.jpg">
    </div>
  </div>
  <br>
  <h2 align="center">De ce să ne <b>alegi pe noi</b>:</h2>
  <br>
  <div class="row">
    <div class="medium-3 columns">
      <h3 style="color:firebrick"><ins>Personal calificat</ins></h3>
      <p>Mecanicii noștri auto au experiență vastă și calificări adecvate pentru a efectua reparații complexe. Aceștia
        sunt specializați în tehnologia modernă și folosesc cele mai noi instrumente și tehnologii pentru a se asigura
        că mașina dumneavoastră este reparată în mod corect.</p>
    </div>
    <div class="medium-3 columns">
      <h3 style="color:firebrick"><ins>Clienți mulțumiți</ins></h3>
      <p>Atelierul nostru are o reputație excelentă în comunitatea locală, datorită serviciilor de înaltă calitate și a
        atenției noastre la detalii. Clienții noștri revin frecvent și ne recomandă cu încredere altor șoferi.</p>
    </div>
    <div class="medium-3 columns">
      <h3 style="color:firebrick"><ins>Garanția lucrărilor</ins></h3>
      <p>Suntem mândri să oferim garanție pe serviciile noastre. Aceasta înseamnă că, în cazul în care există probleme
        după
        reparația mașinii, vom remedia problema fără costuri suplimentare pentru clienții noștri.</p>
    </div>
    <div class="medium-3 columns">
      <h3 style="color:firebrick"><ins>Preturi rezonabile</ins></h3>
      <p> Oferim prețuri competitive și oneste pentru serviciile noastre, astfel încât clienții noștri să nu se simtă
        niciodată exploatați. De asemenea, oferim consultanță gratuită pentru a ajuta clienții să ia cele mai bune
        decizii cu privire la reparațiile necesare.</p>
    </div>
  </div>
  <br>
  <hr>

  <div class="row column">
    <h3 align="center">Specialiștii noștri auto:</h3><br>
  </div>

  <div class="row medium-up-3 large-up-4">
    <div class="personal column">
      <img class="thumbnail"
        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxlLoTrj_vGsN5hfCG0LYxuzT3pwnR26BpxRbmk0nZfipCwUL39tOPbzoSuLftqjiBGx8&usqp=CAU">
    </div>
    <div class="personal column">
      <img class="thumbnail"
        src="https://www.bizcaf.ro/imgcaf/cacheimgdetail/20160927/25551ba6-84ec-11e6-9f1e-5254001b61da/1779299/romania/bizcaf.jpg">
    </div>
    <div class="personal column">
      <img class="thumbnail" src="https://personal-calificat.ro/assets/images/areas/area5.jpg">
    </div>
    <div class="personal column">
      <img class="thumbnail" src="https://stor284848081.anuntul.ro/media/foto/imgs/2020/1/21/226924861.jpg">
    </div>
  </div>
  <hr>


  <?php

  $db = mysqli_connect("localhost:3307", "root", "", "my_auto");

  // Verificați conexiunea la baza de date
  if (!$db) {
    die("Conexiunea la baza de date a eșuat: " . mysqli_connect_error());
  }

  // Definiți interogarea SQL
  $query = "SELECT comentariu, rating FROM recenzii";

  // Executați interogarea și obțineți rezultatele
  $result = mysqli_query($db, $query);

  // Verificați dacă există rezultate
  if (mysqli_num_rows($result) > 0) {
    echo '<div class="review-table">';
    echo "<table>";
    echo "<thead><tr><th>Părerea clienților noștri</th><th>Rating</th></tr></thead>";
    echo "<tbody>";

    // Parcurgeți rezultatele și afișați informațiile dorite
    while ($row = mysqli_fetch_assoc($result)) {
      echo '<tr>';
      echo '<td class="comment-cell">' . $row["comentariu"] . '</td>';
      echo '<td class="rating-cell" style="color: ';

      // Setarea culorii ratingului bazată pe valoare
      if ($row["rating"] >= 4) {
        echo 'green';
      } elseif ($row["rating"] >= 2) {
        echo 'orange';
      } else {
        echo 'red';
      }

      echo ';">' . $row["rating"] . '</td>';
      echo '</tr>';
    }

    echo "</tbody>";
    echo "</table>";
    echo '</div>';
  } else {
    echo 'Nu există recenzii disponibile.';
  }


  // Închideți conexiunea la baza de date
  mysqli_close($db);
  include 'footer.php';

  ?>


  <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
  <script src="https://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>

</html>