<?php
	session_start();
?>

<html>
<head>
	<title>The Barber Shop</title>
	<link href="style_haircut.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<div class="main-nav-bar" id="header-bar">
			<ul class="main-nav">
				<li><a href="index.php"> Home </a></li>
				<li><a class="active" href="haircut.php"> Haircuts & Styles </a></li>
				<li><a href="appointment.php"> Appointments </a></li>
				<li><a href="admin.alogin.php"> Admin </a></li>
				<?php
						if(isset($_SESSION['u_id']))
						{	
							echo('<li style="float:right"><a href="logout.form.php"> Logout </a></li>');
							echo('<li style="float:right"><a href="myprofile.php"> '. $_SESSION['u_uid'] .' </a></li>');
						}
						else
						{
							echo('<li style="float:right"><a href="login.php"> Login </a></li>');
							echo('<li style="float:right"><a href="signup.php"> Register </a></li>');
						}
			?>		
			</ul>
		</div>
	</header>
	
	<section>
		<div class="main-section-container">
			<div class="background-header-hero">
				<div class="background-text">
					<h2>Styles and Pricing</h2>
					<p style="padding-bottom: 15px;">Choose from a wide variety of styles!</p>
				</div>
			</div>
			
			<div class="main-styles">
				<div class="main-styles-form">
					<div class="styles-text">
						<h2>Styles</h2>
						
						<!-- pull styles and prices from database -->
						<?php
							$con = mysqli_connect('localhost','root','','barbers');
							if (!$con)
							{
								die('Could not connect: ' . mysqli_error($con));
							}
							$sql="SELECT * FROM prices order by Style ASC";
							$result = mysqli_query($con,$sql);
							
							while($row = mysqli_fetch_array($result)) 
							{	
								echo "<p style='color:grey;'>   </p>";
								echo "<p style='color:grey;border:none;border-top: 1px solid #ce9c6b;'>".$row['Style']. "</p>";
								echo "<p style='color:grey;'>   </p>";
								echo "<p style='color:grey;'>$" .$row['Price']."</p>";
							}
							mysqli_close($con);
							?>
							
						<p></p>
						
						
					</div>
					
					
				</div>
			</div>
			
		</div>
	
	</section>
	
	<footer>
		<div class="main-footer-container">
			<div class="footer-row">
				<div class="column1">
					<h2>About Us</h2>
					<p>Thank you for your interest in The Barber Shop. We know you have lots of choices where to buy your supplies and get your haircut. We are in the professional barber supply business and have been since 1946. The Barber Shop has continually served the professional barber by providing great products and service at terrific prices for over 70 years. If you need service, we will help you by phone or email. We will take care of your problem. Period. Simply put, we are here to serve you. Let us know how we can help.</p>
				</div>
				<div class="column2">
					<h2>Hours of Operation</h2>
					<p style="text-align:center">Monday: 8:00am - 8:00pm</p>
					<p style="text-align:center">Tuesday: 8:00am - 8:00pm</p>
					<p style="text-align:center">Wednesday: 8:00am - 8:00pm</p>
					<p style="text-align:center">Thursday: 8:00am - 8:00pm</p>
					<p style="text-align:center">Friday: 8:00am - 8:00pm</p>
					<p style="text-align:center">Saturday: 10:00am - 6:00pm</p>
					<p style="text-align:center">Sunday: CLOSED</p>
				</div>
				<div class="column3">
					<h2>Have a Question?</h2>
					<p>Address: 1318 N Monroe St suite d, Tallahassee, FL 32303</p>
					<p>Phone: +1 (800) 746-8541</p>
					<p>Email: contactmail@barbershop.com</p>
					<p>Facebook: @Barbershop</p>
					<p>Twitter: @BarberShop</p>
					<p>Instagram: @BarberShop</p>
				</div>
			</div>
		</div>
	</footer>
	
</body>

</html>