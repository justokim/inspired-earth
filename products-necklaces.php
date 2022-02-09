<?php 
session_start();
require_once "config.php";
require_once "functions.php";
add();
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
                        <a href="cart.php"><span class="ico-products"></span> <?php products(); ?></a>
                    </li>
                    <li>
                        <!-- <a href="login.php"><span class="ico-account"></span> </a> -->
                    </li>
                    <li>
                        <!-- <a href="logout.php"><span class="ico-signout"></span>Sign out</a> -->
                    </li>
                </ul>
            </div>
        </div>

    </header>

    <?php menu(); ?>

    <div id="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="#">Home</a></li>
                <li>Necklaces</li>
            </ul>
        </div>
        <!-- / container -->
    </div>
    <!-- / body -->

    <div id="body">
        <div class="container">
            <div class="products-wrap">
                <aside id="sidebar">
                    <div class="widget">
                        <h3>Sort by Collection: </h3>
                        <form action="products-necklaces.php" method="POST">
                            <fieldset class="form">
                                <input type="radio" name="collection" value="Coins of the World Collection" />
                                <a>Coins of the World</a>
                                <input type="radio" name="collection" value="Oceans Collection" />
                                <a>Oceans</a>
                                <input type="radio" name="collection" value="Beaded Collection" />
                                <a>Beaded</a>
                                <input type="radio" name="collection" value="Earth Collection" />
                                <a>Earth</a>
                                <input type="radio" name="collection" value="Travel Collection" />
                                <a>Travel</a>
                                <input type="radio" name="collection" value="Spirit World Collection" />
                                <a>Spirit World</a>
                            </fieldset>
                            <input type="submit" class="form-submit" name="form_submit" value="Change Collection" />
                        </form>
                    </div>
                </aside>
                <p class="categories"> <?php $filter = $_POST['collection'] ?? 'Earth collection';  echo "$filter" ?>
                </p>
                <div id="content">
                    <section class="products">
                        <?php            
              $result = mysqli_query($link1, "SELECT * FROM products WHERE collections = '{$filter}'  " );
              
              while($row = mysqli_fetch_assoc($result)){
                echo "
                <article>
                  <form  method = 'POST'>
                  <a href='details.php?ID={$row['id']}'>
                    <img src='{$row['img']}' alt='img'/>
                  </a>

                  <h3><a href='details.php?ID={$row['id']}'> {$row['name']}</a></h3>
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
        </div>
    </div>

    <footer id="footer">

        <?php 
      template_footer();
      ?>
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