<?php 

require_once "config.php";
add();



function imgx2($productname, $price, $img, $productid, $desc, $price_id, $spec ){
  $element = <<<EOD
  <form method = "POST">
            <div class="image">
              <img src="$img" alt="" />
            </div>
            <div class="details">
              <h1>$productname</h1>
              <h4>$price</h4>
              <div class="entry">
                
                <div class="tabs">
                  <div class="nav">
                    <ul>
                      <li class="active"><a href="#desc">Description</a></li>
                      <li><a href="#spec">Specification</a></li>
                      
                    </ul>
                  </div>
                  <div class="tab-content active" id="desc">
                    <p>
                      $desc
                    </p>
                  </div>
                  <div class="tab-content" id="spec">
                    <p>
                     $spec
                    </p>
                  </div>
                  
                </div>
              </div>
              <div class="actions">
              

              <td class="qnt"><select name ="quantity" ><option value = 1>1</option><option value = 2>2</option></select></td>
                <button type = "submit" class="btn-grey" name = "add">Add</button>
                <input type = 'hidden' name = 'product_id'  value ='$productid'>
                <input type = 'hidden' name = 'priceid'  value ='$price_id'>
              
            </div>
            
</form>
EOD;
echo $element;

}



function menu(){

  $element = <<<EOD
  <nav id="menu">
  <div class="container">
    <div class="trigger"></div>
    <ul>
      <li><a href="aboutUs.php">About us</a></li>
      <li><a href="events.php">Visit Us</a></li>
      <li><a href="products-necklaces.php">necklaces</a></li>
      <li><a href="products-earrings.php">earrings</a></li>
      <li><a href="products-bracelets.php">Bracelets</a></li>
     
    </ul>
  </div>
 
</nav>
EOD;
echo $element;
}
function products(){

  if(isset($_SESSION['cart'])){
    $count = count($_SESSION['cart']);
    echo "$count PRODUCTS";
    
  }
  else{
    echo "0 Products";
  }
  
}
function login(){
  if(!isset($_SESSION['loggedin'])){
    echo("Log in");
  } elseif($_SESSION['loggedin']==true){
    echo($_SESSION["username"]);}
}


function template_footer(){
  $footer = <<<'EOT'
  <div class="container">
  <div class="cols">
  
      
      <ul class="social">

        <li>
          <a href="https://www.instagram.com/inspiredearthjewelryart/"
            ><span class="ico-in"></span>Instagram</a
          >
        </li>

        <li>
          <a href="#"><span class="ico ico-pi"></span>Pinterest</a>
        </li>

        <li>
        <a
          href="https://www.facebook.com/InspiredEarth-Jewelry-Company-304615416917294"
          ><span class="ico ico-fb"></span>Facebook</a
        >
        </li>

        <li>
        <a href="#"><span class="ico-tw"></span>TikTok</a>
        </li>

        <li>
        <span class="ico-contact"></span>

        <button id="myBtn">Contact Us</button>

<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Contact Us</h2>
    </div>
    <div class="modal-body">
    <form action="mail.php" method="POST">
  
    <input type="text" name="name" placeholder="Name" />
    
    <input type="text" name="email" placeholder="Email" />
    <p>Message</p>
    <textarea name="message" rows="6" cols="30"></textarea><br />
    <input type="submit" value="Send" />
  </form>
    </div>
    
  </div>

</div>
        
        </li>
      
      </ul>
   
  </div>
  <!-- <p class="copy">Copyright 2013 Jewelry. All rights reserved.</p> -->
</div>
<!-- / container -->
EOT;
  echo $footer;
}





function form_submit(){
 
  if(isset($_POST['form_submit'])){
    $_SESSION['collection'][0] = $_POST['collection'];
  }


}



function add(){
  if(isset($_POST['add'])){

    // print_r($_POST['product_id']);    
    // print_r($_POST['priceid']);  
    
  
  if(isset($_SESSION['cart'])){
  //  print_r($_SESSION['cart']);
  
   $item_array_id = array_column($_SESSION['cart'], "product_id");
  
 
  
   if(in_array($_POST['product_id'], $item_array_id)){
     echo "Product is already added";
   }else{
       $count = count($_SESSION['cart']);
       $item_array = array(
         'product_id' => $_POST['product_id'],
         'priceid' => $_POST['priceid'],
         'quantity' => $_POST['quantity'],
       );
       $_SESSION['cart'][$count] = $item_array;
   }
  
  }else{
   $item_array = array(
     'product_id' => $_POST['product_id'],
     'priceid' => $_POST['priceid'],
     'quantity' => $_POST['quantity'],
   );
   $_SESSION['cart'][0] = $item_array;
  //  print_r($_SESSION['cart']);
   
   
  }
  }
}

function remove(){
  if(isset($_POST['remove'])){
      foreach ($_SESSION['cart'] as $key => $value) {
        if($value['product_id']==$_GET['id']){
          unset($_SESSION['cart'][$key]);
          
        }
      }
    
  }
}

?>