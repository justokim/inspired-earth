<?php 
session_start();
require_once "config.php";
require_once "functions.php";
add();
$ID = mysqli_real_escape_string($link1, $_GET['ID']);
$query = "SELECT * FROM products WHERE id = '$ID'UNION SELECT * FROM earrings WHERE id = '$ID' UNION SELECT * FROM bracelets WHERE id = '$ID' " ;      
$result = mysqli_query($link1, $query);
$row = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" media="all" href="css/style.css" />
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

    <?php 
   menu();
   ?>

    <div class="big-section">
        <div id="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="products-bracelets.php">Bracelets</a></li>
                    <li><?php echo $row['name']?></li>
                </ul>
            </div>
        </div>

        <div id="body">
            <div class="container">
                <div id="content" class="full">
                    <div class="product">
                        <?php
              imgx2($row['name'], $row['price'], $row['imgx2'], $row['id'],$row['description'], $row['price_id'], $row['specification']);
            mysqli_close($link1);
            ?>

                    </div>
                </div>
                <!-- / content -->
            </div>
            <!-- / container -->
        </div>
        <!-- / body -->
    </div>

    <footer id="footer">
        <?php 
      template_footer();
      ?>
        <!-- / container -->
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