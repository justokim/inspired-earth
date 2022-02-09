<?php 
session_start();
require_once "config.php";
require_once 'functions.php';
add();
?>


<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Inspired Earth Jewelry</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no" />
    <link rel="stylesheet" media="all" href="css/style.css" />

</head>

<body>
    <header id="header">

        <div class="container">
            <a href="index.php" id="logo" title="Diana’s jewelry">Diana’s jewelry</a>
            <div class="right-links">
                <ul>
                    <li>
                        <a href="cart.php"><span class="ico-products"></span><?php
                products();
                ?></a>
                    </li>
                    <li>
                        <!-- <a href="login.php"><span class="ico-account"></span><?php   
            //    login(); 
                  ?></a> -->
                    </li>
                    <li>
                        <!-- <a href="reset-password.php"><span class="ico-signout"></span>Reset Password</a> -->
                    </li>
                    <li>
                        <!-- <a href="logout.php"><span class="ico-signout"></span>Sign out</a> -->
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <?php menu(); ?>

    <div class="Campaign">
        <div class="campaign-header">
            <a>5% of all proceeds go to Polar Bears </a>
        </div>
        <a href="https://www.donatebid.com/campaign/Inspired%20Earth">Visit DonateBid's campaign!</a>


    </div>

    <div id="slider">
        <ul>
            <li style="background-image: url(images/seed1.jpg)">
                <h3>Make your life better</h3>
                <h2>Genuine Jewelry</h2>

            </li>
            <li class="purple" style="background-image: url(images/seed2.jpg)">

            </li>
            <li class="yellow" style="background-image: url(images/seed3.jpg)">

            </li>
        </ul>
    </div>


    <div id="body">
        <div class="container">
            <div class="last-products">
                <h2>Featured products</h2>
                <section class="products">

                    <?php 
                
                $result = mysqli_query($link1, "SELECT * FROM products ORDER BY RAND() LIMIT 8");
  
                while($row = mysqli_fetch_assoc($result)){
                  echo "
                  <article>
                    <form  method = 'POST'>
                    <a href='details.php?ID={$row['id']}'>
                        <img src='{$row['img']}' alt='img'/>
                    </a>
                    <h3><a href='details.php?ID={$row['id']}'>{$row['name']}</a></h3>
                    <h4><a href='details.php?ID={$row['id']}'>{$row['price']}</a></h4>
                    <input type = 'hidden' name = 'product_id'  value ='{$row['id']}'>
                    <input type = 'hidden' name = 'priceid'  value ='{$row['price_id']}'>
                    </form>
                  </article>";
                  
                }
                mysqli_close($link1);
                  ?>
                </section>
            </div>
        </div>
        <!-- / container -->
    </div>
    <!-- / body -->

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