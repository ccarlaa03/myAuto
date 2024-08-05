
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<?php
    session_start();
    include('headerlogged.php');

    ?>
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

    input:focus,
    textarea:focus,
    keygen:focus,
    select:focus {
        outline: none;
    }

    ::-moz-placeholder {
        color: #666;
        font-weight: 300;
        opacity: 1;
    }

    ::-webkit-input-placeholder {
        color: #666;
        font-weight: 300;
    }

    .container {
        padding: 0 50px 70px;
    }

    .textcenter {
        text-align: center;
    }

    .section1 {
        text-align: center;
        display: table;
        width: 100%;
    }

    .section1 .shtext {
        display: block;
        margin-top: 20px;
    }

    .section1 .seperator {
        border-bottom: 1px solid #a2a2a2;
        width: 35px;
        display: inline-block;
        margin: 20px;
    }

    .section1 h1 {
        font-size: 40px;
        color: firebrick;
        font-weight: normal;
    }

    .section2 {
        width: 1200px;
        margin: 25px auto;
    }

    .section2 .col2 {
        width: 48.71%;
    }

    .section2 .col2.first {
        float: left;
    }

    .section2 .col2.last {
        float: right;
    }

    .section2 .col2.column2 {
        padding: 0 30px;
    }

    .section2 span.collig {
        color: #a2a2a2;
        margin-right: 10px;
        display: inline-block;
    }

    .section2 .sec2addr {
        display: block;
        line-height: 26px;
    }

    .section2 .sec2addr p:first-child {
        margin-bottom: 10px;
    }

    .section2 .sec2contactform input[type="text"],
    .section2 .sec2contactform input[type="email"],
    .section2 .sec2contactform textarea {
        padding: 18px;
        border: 0;
        background: #EDEDED;
        margin: 7px 0;
    }

    .section2 .sec2contactform textarea {
        width: 100%;
        display: block;
        color: #666;
        resize: none;
    }

    .section2 .sec2contactform input[type="submit"] {
        padding: 15px 40px;
        color: #fff;
        border: 0;
        background: firebrick;
        font-size: 16px;
        text-transform: uppercase;
        margin: 7px 0;
        cursor: pointer;
    }

    .section2 .sec2contactform h3 {
        font-weight: normal;
        margin: 20px 0;
        margin-top: 30px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 19px;
        color: firebrick;
    }



    @media only screen and (max-width: 1266px) {
        .section2 {
            width: 100%;
        }
    }

    @media only screen and (max-width: 960px) {
        .container {
            padding: 0 30px 70px;
        }

        .section2 .col2 {
            width: 100%;
            display: block;
        }

        .section2 .col2.first {
            margin-bottom: 10px;
        }

        .section2 .col2.column2 {
            padding: 0;
        }

        body .sec2map {
            height: 250px !important;
        }
    }

    @media only screen and (max-width: 768px) {
        .section2 .sec2addr {
            font-size: 14px;
        }

        .section2 .sec2contactform h3 {
            font-size: 16px;
        }

        .section2 .sec2contactform input[type="text"],
        .section2 .sec2contactform input[type="email"],
        .section2 .sec2contactform textarea {
            padding: 10px;
            margin: 3px 0;
        }

        .section2 .sec2contactform input[type="submit"] {
            padding: 10px 30px;
            font-size: 14px;
        }
    }

    @media only screen and (max-width: 420px) {
        .section1 h1 {
            font-size: 28px;
        }
    }

    h2 {
        color: #FFF;
        font-size: 17px;
        margin-bottom: 30px;
    }
</style>
<body>

    <div class="header">
        <h1><img src="https://i.pinimg.com/736x/98/8d/20/988d2004483746981f41f4db8444e59a.jpg" alt="logo" />My AuTo</h1>
    </div>
    <div class="container">
        <div class="innerwrap">

            <section class="section1 clearfix">
                <div class="textcenter">
                    <span class="shtext"><b>Contactează-ne</b></span>
                    <span class="seperator"></span>
                    <h1>Date de contact</h1>
                </div>
            </section>

            <section class="section2 clearfix">
                <div class="col2 column1 first">
                    <script src='https://maps.googleapis.com/maps/api/js?v=3.exp'></script>
                    <div class="sec2map" style='overflow:hidden;height:550px;width:100%;'>
                        <div id='gmap_canvas' style='height:100%;width:100%;'></div>
                        <div><small><a href="http://embedgooglemaps.com"> embed google maps </a></small></div>
                        <div><small><a href="http://freedirectorysubmissionsites.com/">free web directories</a></small>
                        </div>
                        <style>
                            #gmap_canvas img {
                                max-width: none !important;
                                background: none !important
                            }
                        </style>
                    </div>
                    <script
                        type='text/javascript'>function init_map() { var myOptions = { zoom: 14, center: new google.maps.LatLng(19.075314480255834, 72.88153973865361), mapTypeId: google.maps.MapTypeId.ROADMAP }; map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions); marker = new google.maps.Marker({ map: map, position: new google.maps.LatLng(19.075314480255834, 72.88153973865361) }); infowindow = new google.maps.InfoWindow({ content: '<strong>My Location</strong><br>mumbai<br>' }); google.maps.event.addListener(marker, 'click', function () { infowindow.open(map, marker); }); infowindow.open(map, marker); } google.maps.event.addDomListener(window, 'load', init_map);</script>
                </div>
                <div class="col2 column2 last">
                    <div class="sec2innercont">
                        <div class="sec2addr">
                            <p><span class="collig">Adresă :</span> Seini, jud. MARAMUREȘ</p>
                            <p><span class="collig">Număr de telefon:</span> 0749889999</p>
                            <p><span class="collig">Email :</span> my.auto@gmail.com</p>
                        </div>
                    </div>
                    <div class="sec2contactform">
                        <h3 class="sec2frmtitle">Scrie-ne un e-mail</h3>
                        <form action="">
                            <div class="clearfix">
                                <input class="col2 first" type="text" placeholder="Nume">
                                <input class="col2 last" type="text" placeholder="Prenume">
                            </div>
                            <div class="clearfix">
                                <input class="col2 first" type="Email" placeholder="Email">
                                <input class="col2 last" type="text" placeholder="Număr de telefon">
                            </div>
                            <div class="clearfix">
                                <textarea name="textarea" id="" cols="30" rows="7">Scrie-ne mesajul tău...</textarea>
                            </div>
                            <div class="clearfix"><input type="submit" value="Trimite"></div>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
</body>

</html>