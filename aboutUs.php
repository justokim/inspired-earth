<?php 
session_start();
require_once "config.php";
require_once "functions.php";
?>



<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Diana’s jewelry</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <link rel="stylesheet" media="all" href="css/aboutus.css" />
    <!--[if lt IE 9]>
      <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
    <header id="header">
        <div class="container">
            <a href="index.php" id="logo" title="Diana’s jewelry">Diana’s jewelry</a>
            <div class="right-links">
                <ul>
                    <li>
                        <a href="cart.php"><span class="ico-products"></span>
                            <?php
                products(); 
                ?>
                        </a>

                    </li>
                    <li>
                        <!-- <a href="login.php"><span class="ico-account"></span></a> -->
                    </li>
                    <li>
                        <!-- <a href="logout.php"><span class="ico-signout"></span>Sign out</a> -->
                    </li>
                </ul>
            </div>
        </div>
        <!-- / container -->
    </header>
    <!-- / header -->

    <?php  menu();?>

    <div id="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
        <!-- / container -->
    </div>
    <!-- / body -->
    <div id="body">
        <div class="white-box-outer">
            <div class="white-box">
                <div class="inspired-earth">
                    <h1>About InspiredEarth</h1>

                    <p>
                        Inspired Earth Jewelry was founded by Monica and Erica Tugaeff,
                        mother and daughter, who love designing, wearing and making
                        jewelry using the finest materials found in or on the earth and in
                        the oceans. We began making jewelry we love and began selling our
                        pieces to friends and co-workers. Since then, we have enjoyed
                        selling our jewelry at pop up shops, craft fairs, specialty shops
                        and online. Crystals and minerals have been worn since classical
                        times for beauty as well as for medicinal and healing properties.
                        We love using crystals and minerals in our jewelry and we
                        appreciate the natural healing and energizing properties received
                        when our customers wear them. Our one of a kind pieces are made to
                        be appreciated, inspired and worn for their beauty and as
                        versatile statement pieces and keepsakes. We also believe in
                        giving back to the environment. That is why we will dedicate 15%
                        of our proceeds to supporting environmental causes. A portion of
                        your purchase will be distributed to a cause which will support
                        the environment and preserve the world’s natural environment. We
                        believe in our sustainability mission to wear something from the
                        earth, to appreciate it and to give back. We want to leave the
                        planet better than we left it so we encourage people to use
                        sustainable products, recycle, get involved in community
                        activities to advance sustainability as much as possible.
                        Purchasing from us looks great on you. Look beautiful and be a
                        part of the change we would all like to see in the world.
                    </p>
                </div>

                <div class="artists">
                    <div class="grid-item">
                        <h1>Monica Tugaeff: About the artist</h1>

                        <p>
                            I have always loved rocks and minerals, and as a jewelry
                            designer and enthusiast, I have spent my working life as a
                            Graphic Designer and have always been involved creating art in
                            some way. Creating and designing jewelry is my passion. My
                            daughter, Erica, has joined me in my jewelry business. Together,
                            we make jewelry that gives the wearer a unique look and style.
                        </p>
                    </div>
                    <div class="grid-item">
                        <img src="images/ericfa.jpg" alt="" />
                    </div>

                    <div class="grid-item">
                        <h1>Erica Tugaeff: about the co founder</h1>
                        <p>
                            I love making jewelry alongside my mom, supporting sustainable
                            products and giving back to the environment one piece at a time.
                            We love traveling and sightseeing. We will continue to travel
                            and expand our favorite minerals and crystals and keep us
                            inspired!
                        </p>
                    </div>
                    <div class="grid-item">
                        <img src="images/monica.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer id="footer">

        <?php template_footer();?>
    </footer>
    <!-- / footer -->

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>
    window.jQuery ||
        document.write("<script src='js/jquery-1.11.1.min.js'>\x3C/script>");
    </script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>