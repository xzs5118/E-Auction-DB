<?php 

	session_start();

	if(isset($_POST['submit'])){
		include_once("db.php");
		
		$target="item/".basename($_FILES['image']['name']);
		
		$image=$_FILES['image']['name'];
		
		
		$name = strip_tags($_POST['name']);
		$categories=strip_tags($_POST['categories']);
		$minprice=strip_tags($_POST['minprice']);
		$binprice=strip_tags($_POST['binprice']);
		$aucendtime=strip_tags($_POST['aucendtime']);
		$descrip=strip_tags($_POST['descrip']);
		
		$name=stripslashes($name);
		$categories=stripslashes($categories);
		$minprice=stripslashes($minprice);
		$binprice=stripslashes($binprice);
		$aucendtime=stripslashes($aucendtime);
		$descrip=stripslashes($descrip);
		
		$name=mysqli_real_escape_string($db, $name);
		$categories=mysqli_real_escape_string($db, $categories);
		$minprice=mysqli_real_escape_string($db, $minprice);
		$binprice=mysqli_real_escape_string($db, $binprice);
		$aucendtime=mysqli_real_escape_string($db, $aucendtime);
		$descrip=mysqli_real_escape_string($db, $descrip);
		
		$currentprice=$minprice;
		$username=$_SESSION['username'];
		
		
		$sql_store="INSERT into products (username, Name, Categories, StartPrice, CurrentPrice,Currentwinner, BuyPrice, EndTime, Description, image) VALUES ('$username','$name','$categories','$minprice','$currentprice',NULL,'$binprice','$aucendtime','$descrip', '$image')";
		
		$imageinfo=getimagesize($_FILES['image']['tmp_name']);
		if($imageinfo == FALSE) {
			echo "<script>if(confirm('Please upload an image!')){document.location.href='additem.php'};</script>";
			return;
		}
		
		if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
			echo "Uploaded successful!";
		} else {
			echo "Uploaded failed";
		}
		
		
		
		if(!is_numeric($minprice) || $minprice < 0){
			echo "<script>if(confirm('Please insert a valid auction price!')){document.location.href='additem.php'};</script>";
			return;
		}
		
		if(!is_numeric($binprice) || $binprice < $minprice){
			echo "<script>if(confirm('Buy it now price must higher than auction price!')){document.location.href='additem.php'};</script>";
			return;
		}
		
		if(DateTime::createFromFormat('Y-m-d G:i:s', $aucendtime) != TRUE){
			echo "<script>if(confirm('Please insert valid date and time using YYYY-MM-DD HH:MM:SS!')){document.location.href='additem.php'};</script>";
			return;
		}
		
		
		$result = mysqli_query($db, $sql_store);
		if($result){
			
			header("Location: profile_products.php?username=$username");
		} else {
			echo "<script>if(confirm('Cannot add to database')){document.location.href='additem.php'};</script>";
			return;
		}
		
		
		
		
	}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Sell Products</title>
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
<!--The following script tag downloads a font from the Adobe Edge Web Fonts server for use within the web page. We recommend that you do not modify it.--><script>var __adobewebfontsappname__="dreamweaver"</script><script src="http://use.edgefonts.net/lobster:n4:default.js" type="text/javascript"></script>
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
<!-- shop locator (popup) -->
	<!-- Button trigger modal(shop-locator) -->
	<div id="small-dialog1" class="mfp-hide">
<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</div>
	<!-- //shop locator (popup) -->
	<!-- signin Model -->
	<!-- Modal1 -->
	<div class="modal fade" id="myModal1" tabindex="-1" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header"> </div>
				<div class="modal-body modal-body-sub_agile">
					<div class="main-mailposi">
						<span class="fa fa-envelope-o" aria-hidden="true"></span>
					</div>
					<div class="modal_body_left modal_body_left1">
						<h3 class="agileinfo_sign">Sign In </h3>
						<p>
							Sign In now, Let's start your E-auction! Don't have an account?
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
						<p> Come join the E-auction! Let's set up your Account. </p>
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
	<!-- navigation -->
	<!-- //navigation -->
	<!-- banner-2 -->	<!-- //banner-2 -->
	<!-- page -->
<div class="agile_inner_breadcrumb" id="youracct">
    <div class="container">
		    <ul class="w3_short">
		      <li> <a href="index.html">Home</a> <i>|</i> </li>
			  <li>Sell Products </li>
	        </ul>
	      </div>
	  </div>
	<!-- //page -->
	<!-- contact page -->
<div class="contact-w3l">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Sell Products <span class="heading-style"> <em></em> <em></em> <em></em> </span> </h3>
			<!-- //tittle heading -->
			<!-- contact -->
			<div class="contact agileits">
				<div class="contact-agileinfo">
					<div class="contact-form wthree">
						<form action="additem.php" method="post" enctype="multipart/form-data">
							<div class="">
								<input type="text" name="name" placeholder="Name" required="">
							</div>
							<div class="">
								<select id="agileinfo-nav_search" name="categories" required="">
                					<option value="">Choose category</option>
									<option value="Automobile">Automobile</option>
									<option value="Electronics">Electronics</option>
									<option value="Grocery">Grocery</option>
									<option value="Household">Household</option>
									<option value="Personal Care">Personal Care</option>
									<option value="Stationary">Stationary</option>
									<option value="Software">Software</option>
									<option value="Sports">Sports</option>
									<option value="Toys">Toys & Games</option>
									<option value="Video Games">Video Games</option>
									<option value="Other">Other</option>
              					</select>
							</div>
							<div class="">
								<input class="minprice" type="text" name="minprice" placeholder="Start Auction Price" required="">
								<input class="binprice" type="text" name="binprice" placeholder="BuyItNow Price" required="">
								<input class="aucendtime" type="text" name="aucendtime" placeholder="YYYY-MM-DD HH:MM:SS" required="">
							</div>
							<div class="">
							  <textarea placeholder="Description" name="descrip" required=""></textarea>
							</div>
							<div class="">
							  <label for="textfield">Photos:</label>
                              <!--<input class="photos" type="photos" name="photos" required="">-->
							</div> 
							<div>
							   <input type="file" name="image">
							</div>
							<input type="submit" value="Submit" name="submit">
						</form>
					</div>

				</div>
			</div>
			<!-- //contact -->
		</div>
</div>
	<!-- map -->
	
	<!-- //map -->
	<!-- newsletter -->
	<!-- //newsletter -->
	<!-- footer -->
	<footer>
		<div class="container">
			<!-- footer first section -->
			<p class="footer-main"> <span>"Database Daredevils"</span> is an e-Auction commerce company which aims to provide customers with the unmatched opportunities of online auction along with the regular trade opportunities.</p>
			<!-- //footer first section -->
			<!-- footer second section -->
		  <div class="w3l-grids-footer">
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-map-marker" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Track Your Order</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-refresh" aria-hidden="true"></span>
					</div>
					<div class="col-xs-8 text-form-footer">
						<h3>Free & Easy Returns</h3>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="col-xs-4 offer-footer">
					<div class="col-xs-4 icon-fot">
						<span class="fa fa-times" aria-hidden="true"></span>
					</div>
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
			        <li> <i class="fa fa-envelope-o"></i> <a href="mailto:example@mail.com"> contactus@psu.edu</a> </li>
		          </ul>
		        </div>
		      </div>
			  <!-- //quick links -->
			  <!-- social icons -->
			  <div class="col-sm-2 footer-grids  w3l-socialmk">
			    <h3>Follow Us on</h3>
			    <div class="social">
			      <ul>
			        <li> <a class="icon fb" href="#"> <i class="fa fa-facebook"></i> </a> </li>
			        <li> <a class="icon tw" href="#"> <i class="fa fa-twitter"></i> </a> </li>
			        <li> <a class="icon gp" href="#"> <i class="fa fa-google-plus"></i> </a> </li>
		          </ul>
		        </div>
			    <div class="agileits_app-devices">
			      <h5>Download the App</h5>
			      <a href="#"> <img src="images/1.png" alt=""> </a> <a href="#"> <img src="images/2.png" alt=""> </a>
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
						<li>
							<img src="images/pay2.png" alt="">
						</li>
						<li>
							<img src="images/pay5.png" alt="">
						</li>
						<li>
							<img src="images/pay1.png" alt="">
						</li>
						<li>
							<img src="images/pay4.png" alt="">
						</li>
						<li>
							<img src="images/pay6.png" alt="">
						</li>
						<li>
							<img src="images/pay3.png" alt="">
						</li>
						<li>
							<img src="images/pay7.png" alt="">
						</li>
						<li>
							<img src="images/pay8.png" alt="">
						</li>
						<li>
							<img src="images/pay9.png" alt="">
						</li>
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

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
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

	<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->
</body>

</html>