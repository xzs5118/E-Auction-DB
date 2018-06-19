<?php
	session_start();

	include("db.php");

	if(!isset($_GET['ID'])){
		header("Location: index.php");
	} else {
		$id = $_GET['ID'];
	} 
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Single</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--//tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!--pop-up-box-->
	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
	<!--//pop-up-box-->
	<!-- price range -->
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">
	<!-- fonts -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/lobster:n4:default;almendra-sc:n4:default.js" type="text/javascript"></script>
</head>

<body>
	<!-- top-header -->
<div class="header-most-top">
		<p>Grocery Offer Zone Top Deals & Discounts</p>
	</div>
	<!-- //top-header -->
	<!-- header-bot-->

<div>
<div class="header-bot">
    <div class="header-bot_inner_wthreeinfo_header_mid">
      <!-- header-bot-->
      <div class="logo_agile col-md-12">
        <h1> <a href="index.php"> <span id="auction">E- Auction</span> <img src="images/eauction.png" alt=" " width="50"> </a> </h1>
      </div>
      <!-- header-bot -->
      <div class="header col-md-12">
        <!-- header lists -->
        <ul>
          <li> <a class="play-icon popup-with-zoom-anim" href="#small-dialog1"> <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>Languages</a> </li>
          <li> <a href="https://www.usps.com/" target="_blank" data-toggle="modal"> <span class="fa fa-truck" aria-hidden="true"></span>Track Order</a> </li>
          <li> <span class="fa fa-phone" aria-hidden="true"></span> 123-456-7890 </li>
			<li>
			  <?php 
					echo "<h5><span class='fa fa-user-circle-o' aria-hidden='true'></span> Welcome: ".$_SESSION['username']."</h5>"; 
				?>	
				</li>
				<li>
						  <a href="logout.php">
							  <span class="fa fa-window-close-o" aria-hidden="true"></span> Log Out </a>
				  </li>

        </ul>
		  
		  
        <!-- //header lists -->
        <!-- search -->
        <div class="agileits_search">
          <form action="search.php" method="post" class="col-md-12" id="search2">
            <table width="200" border="1">
              <tbody>
                <tr> </tr>
              </tbody>
            </table>
            <input name="search" type="search" placeholder="What are you looking for?" required="">
            <button type="submit" class="btn btn-default" aria-label="Left Align"> <span class="fa fa-search" aria-hidden="true"> </span> </button>
          </form>
        </div>
        <div class="top_nav_right">
          <div class="wthreecartaits wthreecartaits2 cart cart box_1">
            <form action="checkout.php" method="post" class="last">
				  <input type="hidden" name="cmd3" value="_cart">
				  <input type="hidden" name="display" value="1">
				  <button class="w3view-cart" type="submit" name="submit"> 
					  <i class="" aria-hidden="true">My Shopping-cart</i>
				</button>
            </form>
          </div>
        </div>
        <!-- //search -->
        <!-- cart details -->
        <!-- //cart details -->
		  
      </div>
      <div class="ban-top">
        <div class="container">
          <div class="agileits-navi_search">
            <form action="categories.php" method="POST" id="catgoryselect2">
              <select id="agileinfo-nav_search" name="categories" >
				<option value = ''>All Categories</option>
				<option value="Automobile", name = "Automobile">Automobile</option>
                <option value="Electronics",name = "Electronics">Electronics</option>
                <option value="Grocery",name = "Grocery">Grocery</option>
                <option value="Household",name = "Household">Household</option>
                <option value="Personal Care",name = "Personal Care">Personal Care</option>
                <option value="Stationary",name = "Stationary">Stationary</option>
                <option value="Software",name = "Software">Software</option>
                <option value="Sports",name = "Sports">Sports</option>
                <option value="Toys",name = "Toys & Games">Toys & Games</option>
                <option value="Video Games",name = "Video Games">Video Games</option>
                <option value="Other",name = "Other">Other</option>
                <option value="Featured",name = "Featured">Featured</option>
              </select>
				
				<input type="submit" value="Browse"/>
			  </form>
          </div>
          <div class="top_nav_left">
            <nav class="navbar navbar-default">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
							    aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav menu__list" id="menulist">
                    <li> <a class="nav-stylehead" href="index.php">Home <span class="sr-only">(current)</span> </a> </li>
					  <li class=""> <a class="nav-stylehead" href="additem.php">Sell Products</a> </li>
					  <li class=""><a class="nav-stylehead" href="profile_products.php">My Products</a></li>
                    <li class=""> <a class="nav-stylehead" href="contact.php">Contact Us</a> </li>
					  <li class=""> <a class="nav-stylehead" href="profile_ind.php">My information</a> </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </div>
      </div>
</div>
  </div>
</div>
	<div id="small-dialog1" class="mfp-hide">
	<div id="google_translate_element"></div>
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In </h3>
						<p>
							Sign In now, Let's start your Grocery Shopping. Don't have an account?
							<a href="#" data-toggle="modal" data-target="#myModal2">
								Sign Up Now</a>
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="User Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" required="">
							</div>
							<input type="submit" value="Sign In">
						</form>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal1 -->
	<!-- //signin Model -->
	<!-- signup Model -->
	<!-- Modal2 -->
	<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign Up</h3>
						<p>
							Come join the Grocery Shoppy! Let's set up your Account.
						</p>
						<form action="#" method="post">
							<div class="styled-input agile-styled-input-top">
								<input type="text" placeholder="Name" name="Name" required="">
							</div>
							<div class="styled-input">
								<input type="email" placeholder="E-mail" name="Email" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Password" name="password" id="password1" required="">
							</div>
							<div class="styled-input">
								<input type="password" placeholder="Confirm Password" name="Confirm Password" id="password2" required="">
							</div>
							<input type="submit" value="Sign Up">
						</form>
						<p>
							<a href="#">By clicking register, I agree to your terms</a>
						</p>
					</div>
				</div>
			</div>
			<!-- //Modal content-->
		</div>
	</div>
	<!-- //Modal2 -->
	<!-- //signup Model -->
	<!-- //header-bot -->
	<!-- navigation -->	<!-- //navigation -->
	<!-- banner-2 -->
	
	<!-- //banner-2 -->
	<!-- page -->
	<div class="services-breadcrumb">
		<div class="agile_inner_breadcrumb">
			<div class="container">
				<ul class="w3_short">
					<li>
						<a href="index.html">Home</a>
						<i>|</i>
					</li>
					<li>Single Product</li>
				</ul>
			</div>
		</div>
</div>
	<!-- //page -->
	<!-- Single Page -->
	<div class="banner-bootom-w3-agileits">
	  <div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Single Product
			  <span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="col-md-5 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<?php
				include_once("db.php");
				$sql="SELECT * FROM products WHERE ID=$id LIMIT 1";
				$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_array($result);
				echo "<img src='item/".$row['image']."' width='100%' height='100%'/>";
				?>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-7 single-right-left simpleCart_shelfItem">
				<?php
				include_once("db.php");
				$sql="SELECT * FROM products WHERE ID=$id LIMIT 1";
				$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_array($result);
				echo "<h3>".$row['Name']."</h3>";
				?>
				<p>
									<?php
				include_once("db.php");
				$sql="SELECT * FROM products WHERE ID=$id LIMIT 1";
				$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_array($result);
				echo "<span class='item_price'>$".$row['BuyPrice']."</span>";
				?>
					<label style="font-size: 12px">Get now without bidding!</label>
				</p>
				<div class="single-infoagile"></div>
				<div class="product-single-w3l">
					<p>
						<i class="fa fa-hand-o-right" aria-hidden="true"></i>
						<label style="color: #3871D7">Buy It Now &amp; Enjoy our great deal!</label>
					</p>
					<?php
				include_once("db.php");
				$sql="SELECT * FROM products WHERE ID=$id LIMIT 1";
				$result=mysqli_query($db,$sql);
				$row=mysqli_fetch_array($result);
				echo "<h4>".$row['Description']."</h4>";
				?>
					<p>
						<i class="fa fa-refresh" aria-hidden="true"></i>Return Police:
					  <label>Free Return w/ 30 days.</label>
					</p>
				</div>
				<div class="occasion-cart">
					<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
						<?php
						$id = $_GET['ID'];
						echo "<form action='addtocart.php?ID=$id' method='post'>";
						echo "<fieldset>";
						echo "<input type='submit' name='submit' value='Buy It Now!' class='button' />";
						echo	"</fieldset>";
						echo "</form>";
							?>
					</div>

				</div>

			</div>
		<div class="clearfix">
		</div>
		<div>
		  <h2 class="bidrecord" id="bidrecord" style="text-align:center; font-family: 'almendra-sc'; font-style:normal; font-weight:400; color:#AF181A; height: 60px; margin-top:100px"> Bidding &amp; Pricing</h2>
		</div>
		<div class="table-responsive">
			  <table class="timetable_sub">
			    <thead>
			      <tr>
			        <th>Start Price</th>
			        <th>Current Price</th>
					  <th>Current Winner</th>
			        <th>End Time</th>
			        <th>Time Left</th>
		          </tr>
		        </thead>
			    <tbody>
			      <?php
							  include_once("db.php");
								$sql="SELECT * FROM products where ID=$id LIMIT 1";
								$result=mysqli_query($db,$sql);
								$row=mysqli_fetch_array($result);
									$id=$row['ID'];
							  echo  "	<tr class='rem1'> ";							
					       echo "<td class='invert'> ";
									echo "<h4>$".$row['StartPrice']."</h4>";						  
						echo "</td> ";
					$f=sprintf("%.2f",$row['CurrentPrice']);
					       echo "<td class='invert'> ";			
									echo "<h4>$".$f."\n</h4>";							  
						echo "</td> ";
								echo "<td class='invert'> ";	
					if($row['Currentwinner']===NULL){
						echo "Nobody wants it yet!";
					}
					else{
						echo "<h4>".$row['Currentwinner']."</h4>";	
					}
						echo "</td> ";
					       echo "<td class='invert'> ";							
									echo "<h4>".$row['EndTime']."</h4>";					  
						echo "</td> ";
								  ?>
					<td class="rem1">
						<p id="demo"></p>
						<script>
// Set the date we're counting down to
var countDownDate = new Date('<?php include_once("db.php");
								$sql="SELECT * FROM products where ID=$id LIMIT 1";
								$result=mysqli_query($db,$sql);
								$row=mysqli_fetch_array($result); echo $row['EndTime'] ?>').getTime();

// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now an the count down date
    var distance = countDownDate - now;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    // Output the result in an element with id="demo"
	if(distance > 0){
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";}
	else{
    
    // If the count down is over, write some text 
        clearInterval(x);
		document.getElementById("demo").innerHTML =
			"<?php 
			$id2=$_GET['ID'];
			$sql="SELECT * FROM products where ID=$id2 LIMIT 1";
			$result=mysqli_query($db,$sql);
			$row=mysqli_fetch_array($result);
			$winner=$row['Currentwinner'];
			if($winner===NULL){
				echo "Nobody wins.";
			} elseif($winner!=$_SESSION['username']) {
				echo "<form action='bidwinner.php?ID=$id2' method='post'>";
				echo "<button class='submit check_out biditem' type='submit' name='submit' style='width: 300px'>$winner is winner! </button>";
				echo	"</form>";
			}
			else{
				echo "<form action='bidwinner.php?ID=$id2' method='post'>";
				echo "<button class='submit check_out biditem' type='submit' name='submit' style='width: 300px'>You are winner! </button>";
				echo	"</form>";
			}
			?>";
    }
}, 1000);
</script>
					</td>
</tbody>
		      </table>
			<?php
			$id = $_GET['ID'];
			echo "<form action='bidding.php?ID=$id' method='post'>";
		echo "<button class='submit check_out biditem' type='submit' name='submit' style='align-content: center'>I Want It!</button>";
		echo	"</form>"
									?>
	    </div>
		</div>
	</div>
	<!-- //Single Page -->
	<!-- special offers -->
	<div class="featured-section" id="projects">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Add More
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<div class="content-bottom-in">
				<ul id="flexiselDemo1">
										<?php
						include_once("db.php");
						$sql="SELECT * FROM products";
								$result=mysqli_query($db,$sql);
								while($row=mysqli_fetch_array($result)){
									$id=$row['ID'];
									echo "<li>";
						echo "<div class='w3l-specilamk'>";
						echo  "<div class='speioffer-agile'>";
						echo "<img src='item/".$row['image']."' width='100px' height='100px'/>";
						echo "</div>";
						echo "<div class='product-name-w3l'>";
						echo	"<h4>".$row['Name']."</h4>";
						echo	"<div class='w3l-pricehkj'><h6>$".$row['StartPrice']."</h6></div>";
						echo		"<div class='snipcart-details top_brand_home_details item_add single-item hvr-outline-out'>";
						echo		"<form action='singleitem.php?ID=$id' method='post'>";
						echo		"<input type='submit' name='submit' value='Bid Now' class='button' />";
						echo		"</form></div></div></div>";
									echo "</li>";
								}
							?>			
				</ul>
			</div>
		</div>
	</div>
	<!-- //special offers -->

	<!-- newsletter -->	<!-- //newsletter -->
	<!-- footer -->
	
	
	<footer>
	  <div class="container">
	    <!-- footer first section -->
	    <p class="footer-main"> <span>"Database Daredevils"</span> is an e-Auction commerce company which aims to provide customers with the unmatched opportunities of online auction along with the regular trade opportunities.</p>
	    <!-- //footer first section -->
	    <!-- footer second section -->
	    <div class="w3l-grids-footer">
	      <div class="col-xs-4 offer-footer">
	        <div class="col-xs-4 icon-fot"> <span class="fa fa-map-marker" aria-hidden="true"></span></div>
	        <div class="col-xs-8 text-form-footer">
	          <h3>Track Your Order</h3>
            </div>
	        <div class="clearfix"></div>
          </div>
	      <div class="col-xs-4 offer-footer">
	        <div class="col-xs-4 icon-fot"> <span class="fa fa-refresh" aria-hidden="true"></span></div>
	        <div class="col-xs-8 text-form-footer">
	          <h3>Free & Easy Returns</h3>
            </div>
	        <div class="clearfix"></div>
          </div>
	      <div class="col-xs-4 offer-footer">
	        <div class="col-xs-4 icon-fot"> <span class="fa fa-times" aria-hidden="true"></span></div>
	        <div class="col-xs-8 text-form-footer">
	          <h3>Online cancellation </h3>
            </div>
	        <div class="clearfix"></div>
          </div>
	      <div class="clearfix"></div>
        </div>
	    <!-- //footer second section -->
	    <!-- footer third section -->
	    <div class="footer-info w3-agileits-info">
	      <!-- footer categories -->
	      <!-- //footer categories -->
	      <!-- quick links -->
	      <div class="col-sm-5 address-right">
	        <div class="col-xs-6 footer-grids">
	          <h3>Get in Touch</h3>
	          <ul>
	            <li> <i class="fa fa-map-marker"></i> The Pennsylvania State University, United States</li>
	            <li> <i class="fa fa-mobile"></i> +1-814-717-0892 </li>
	            <li> <i class="fa fa-phone"></i> +1-821-11-4364 </li>
	            <li> <i class="fa fa-envelope-o"></i> <a href="mailto:example@mail.com"> contactus@psu.edu</a></li>
              </ul>
            </div>
          </div>
	      <!-- //quick links -->
	      <!-- social icons -->
	      <div class="col-sm-2 footer-grids  w3l-socialmk">
	        <h3>Follow Us on</h3>
	        <div class="social">
	          <ul>
	            <li> <a class="icon fb" href="#"> <i class="fa fa-facebook"></i></a></li>
	            <li> <a class="icon tw" href="#"> <i class="fa fa-twitter"></i></a></li>
	            <li> <a class="icon gp" href="#"> <i class="fa fa-google-plus"></i></a></li>
              </ul>
            </div>
	        <div class="agileits_app-devices">
	          <h5>Download the App</h5>
	          <a href="#"> <img src="images/1.png" alt=""></a> <a href="#"> <img src="images/2.png" alt=""></a>
	          <div class="clearfix"> </div>
            </div>
          </div>
	      <!-- //social icons -->
	      <div class="clearfix"></div>
        </div>
	    <!-- //footer third section -->
	    <!-- footer fourth section (text) -->
	    <div class="agile-sometext">
	      <!-- brands -->
	      <!-- //brands -->
	      <!-- payment -->
	      <div class="sub-some child-momu">
	        <h5>Payment Method</h5>
	        <ul>
	          <li> <img src="images/pay2.png" alt=""></li>
	          <li> <img src="images/pay5.png" alt=""></li>
	          <li> <img src="images/pay1.png" alt=""></li>
	          <li> <img src="images/pay4.png" alt=""></li>
	          <li> <img src="images/pay6.png" alt=""></li>
	          <li> <img src="images/pay3.png" alt=""></li>
	          <li> <img src="images/pay7.png" alt=""></li>
	          <li> <img src="images/pay8.png" alt=""></li>
	          <li> <img src="images/pay9.png" alt=""></li>
            </ul>
          </div>
	      <!-- //payment -->
        </div>
	    <!-- //footer fourth section (text) -->
      </div>
</footer>
	<!-- //footer -->
	<!-- copyright -->
	<div class="copy-right">
		<div class="container">
			<p>Copyright &copy; 2018. Database Daredevil All rights reserved.</p>
		</div>
	</div>
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
<script src="js/jquery-2.1.4.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
<script src="js/jquery.magnific-popup.js"></script>
<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
<script src="js/minicart.js"></script>
<script>
		paypalm.minicartk.render(); //use only unique class names other than paypal1.minicart1.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 1) {
				alert('The minimum order quantity is 1. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script>
	<!-- //cart-js -->

	<!-- password-script -->
<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
<script src="js/move-top.js"></script>
<script src="js/easing.js"></script>
<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- imagezoom -->
<script src="js/imagezoom.js"></script>
	<!-- //imagezoom -->

	<!-- FlexSlider -->
<script src="js/jquery.flexslider.js"></script>
<script>
		// Can also be used with $(document).ready()
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				controlNav: "thumbnails"
			});
		});
	</script>
	<!-- //FlexSlider-->

	<!-- flexisel (for special offers) -->
<script src="js/jquery.flexisel.js"></script>
<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>