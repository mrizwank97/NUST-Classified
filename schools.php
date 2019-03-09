
<?php
session_start();
include_once(".\config\config1.php");
if(isset($_SESSION['email'])){
	$name = $_SESSION['name'];
}
if(isset($_POST['register'])){
	$username = mysqli_real_escape_string($mysqli, $_POST['username']);
	$result = mysqli_query($mysqli, "SELECT * FROM users where username = '$username'");
	if(mysqli_num_rows($result) == 0) {
		$first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
		$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		$password = mysqli_real_escape_string($mysqli, $_POST['password']);
		$password = password_hash($password,PASSWORD_DEFAULT);
		$query = "INSERT INTO users(username,first_name,last_name,email,password) VALUES ('$username','$first_name','$last_name','$email','$password')";
		if(mysqli_query($mysqli,$query)){
			echo "<script>alert('Registration Successful')</script>";
		}
	}
	else{
		echo "<script>alert('This username already exits')</script>";
	}
		
}
if(isset($_POST['login'])){
	$email = mysqli_real_escape_string($mysqli, $_POST['email']);
	$password = mysqli_real_escape_string($mysqli, $_POST['password']);
	$query = "SELECT * FROM users WHERE email = '$email'";
	$result1 = mysqli_query($mysqli, $query);
	if(mysqli_num_rows($result1) > 0){
		while($res = mysqli_fetch_array($result1)){
			if(password_verify($password, $res['password'])){
				$_SESSION['email'] = $email;
				$_SESSION['name'] = $res['first_name'];
				$name = $res['first_name'];
			}
		}
	}else{
		echo "<script>alert('Wrong username or password')</script>";
	}
}
if(isset($_POST['logout'])){
	session_unset(); 
	session_destroy();
}
?>
<html lang="en">
<head>
  <title>Schools</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function switchVisible() {
	    if (document.getElementById('Div1')) {
	        if (document.getElementById('Div1').style.display == 'none') {
	            document.getElementById('Div1').style.display = 'block';
	            document.getElementById('Div2').style.display = 'none';
	        }
	        else {
	            document.getElementById('Div1').style.display = 'none';
	            document.getElementById('Div2').style.display = 'block';
	        }
	    }
    }
	$(document).ready(function(){
		$("#nav > li > a").on("click", function(e){
			if($(this).parent().has("ul")) {
				e.preventDefault();
			}
			if(!$(this).hasClass("open")) {
      // hide any open menus and remove all other classes
      			$("#nav li ul").slideUp(350);
      			$("#nav li a").removeClass("open");
 
      // open our new menu and add the open class
			    $(this).next("ul").slideDown(350);
      			$(this).addClass("open");
    		}
 
    		else if($(this).hasClass("open")) {
      			$(this).removeClass("open");
      			$(this).next("ul").slideUp(350);
    		}
  		});
	});
</script>
	

</head>
<body  style="background-image: url('photos/school-bg.jpg'); background-repeat: no-repeat; background-position: center center;background-size: cover; background-attachment: fixed; ">
<nav class="navbar navbar-inverse school-color navbar-fixed-top">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                	<span class="icon-bar"></span>
					<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
            	</button>
                <a href="home.php" class ="navbar-brand" style="color: #FFFFFF"> NUST Classified </a>
            </div>
            <!-- Menu Items -->
            <div class="collapse navbar-collapse" id="mainNavBar">
                <ul class="nav navbar-nav">
                    <li><a href="home.php" style="color: #FFFFFF">Home</a></li>
                    <li class="active"><a href="#" style="color: #FFFFFF">Schools</a></li>
                    <li><a href="hostel.php" style="color: #FFFFFF">Hostels</a></li>
					<li><a href="#" style="color: #FFFFFF">Socities</a></li>
					<li><a href="about-us.php" style="color: #FFFFFF">About Us</a></li>
					<li>
       				<form class="navbar-form" role="search" method="get" action="search.php">
        				<div class="input-group">
            				<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
            					<div class="input-group-btn">
                					<button class="btn btn-default" type="submit"><i style="color: #00688B" class="glyphicon glyphicon-search"></i></button>
            					</div>
        				</div>
        			</form>
					</li>
                </ul>

     <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href=""><i class="glyphicon glyphicon-globe"></i></a></li>
          <li><a href=""><i class="glyphicon glyphicon-envelope"></i></a></li> -->
          <?php
		  if(!isset($_SESSION['email'])){
		  echo '<li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="color-blue">Login</b> <span class="caret"></span></a>
            <ul class="dropdown-menu login-panel">
              <li>
                <!-- LOG IN -->
                  <div id="Div1">
                    <div class="dropdown-header">
                        <span class="login-header color-blue">Sign In</span>
                        <span class="forgot-password color-blue"><a href="">Forgot password?</a></span>
                    </div>
                    <div class="clearfix"></div>
                    <div style="padding:20px;" >
                      <form id="sign_in" class="form-horizontal" action="schools.php" role="form" method="POST" >
                      <input type="hidden" name="_token" value="vRBAgZmSlHWdJYHGtrZrtuJ9JaaVNjKSv0HRTthm">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                            <!-- USERNAME OR EMAIL ADDRESS -->
                            <input  type="text" class="form-control" name="email" id="email" placeholder="Email" value="" required>
                        </div>
                        <div class="input-group ">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                          <!--  PASSWORD  -->
                          <input id="password" type="password" class="form-control" name="password" placeholder="password"  required>
                        </div>
                                                      
                        <div class="center-text">
                            <label><input id="login-remember" type="checkbox" name="remember" value=""> Remember me</label>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                            <div class="col-sm-12 controls center-text">
                              <button id="btn-login"  type="submit" name="login" class="btn btn-block btn-success">Login</button>
                              <!-- <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a> -->
                            </div>
                            <div class="clearfix"></div>
                            <span class="center-text register-message" onclick="javascript:switchVisible();">New user? <a href="#" >Register for free.</a></span>
                        </div>
                      </form>
                    </div>
                  </div> <!-- LOGIN DIV1 ENDS HERE -->

                  <!-- SIGN UP -->
                  <div id="Div2" style="display: none">
                    <div class="dropdown-header">
                        <span class="login-header color-blue">Sign Up</span>
                    </div>
                    <div class="clearfix"></div>
                    <div style="padding: 9px 25px;">
                      <form id="loginform" class="form-horizontal" action="schools.php" role="form" method="POST">
                        <input type="hidden" name="_token" value="vRBAgZmSlHWdJYHGtrZrtuJ9JaaVNjKSv0HRTthm">
                        <div class="input-group form-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                            <!-- FIRST NAME -->
                            <input id="name" type="text" class="form-control" name="first_name" value="" placeholder="First Name" required>
                        </div>
                        
                        <div class="input-group form-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                            <!-- LAST NAME -->
                            <input id="name" type="text" class="form-control" name="last_name" value="" placeholder="Last Name" required>
                        </div>
                        <div class="input-group form-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                            <!-- USERNAME OR EMAIL ADDRESS -->
                            <input id="email" type="text" class="form-control" name="username" value="" placeholder="Username" required>
                        </div>
						
                        <div class="input-group form-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>
                            <!-- USERNAME OR EMAIL ADDRESS -->
                            <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email" required>
                        </div>
                                                <div class="input-group form-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                            <!--  PASSWORD  -->
                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div style="margin-top:10px" class="form-group">
                          <div class="col-sm-12 controls center-text">
                            <button type="submit" name="register" class="btn btn-block btn-success">Sign Up</button>
                            <!-- <a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a> -->
                          </div>
                          <div class="clearfix"></div>
                          <span class="center-text register-message" onclick="javascript:switchVisible();">Already have an account? <a href="#">Login</a></span>
                        </div>
                      </form>
                    </div>
                  </div>
              </li>
            </ul>
           </li>
		  ';}
		  else{
			echo '
			<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="color-blue">'.$name.'</b> <span class="caret"></span></a>
				<ul class="dropdown-menu login-panel">
					<li>
						<form action="schools.php" class="form-horizontal" role="form" style="margin-top:5px;" method="POST">
							<button id="btn-login"  type="submit" name="logout"  class="btn btn-block btn-success">Logout</button>
						</form>
					</li>
				</ul>
			</li>';			
		  }
		  ?>
		   <li class="dropdown">
            <a href="form.php" class="dropdown-toggle" style="color: white;">
              Post an AD
            </a>
          </li>
        </ul>
    </div>
  </div>
</nav>
  

</br>
</br>
<div class="container-fluid text-center">    
  <div class="row content">
  </br>

    <!--Adding Side Navigation Bar-->
    <?php
      include("sidenav.php");
    ?>

    <div class="col-sm-8 text-left">
		<p class="h3">Categories</p>
		<hr/>
		<div class="row">
		<a href="search.php?srch-term=education"><div class="card-category" style="background-color: #CC7722;">
			<div class ="category">
				<img src="photos/education.jpg">
			</div>
			<p class="h4" style="color: black">Education</p>
		</div></a>
		<a href="search.php?srch-term=events"><div class="card-category" style="background-color: #683A5E;">
			<div class ="category">
				<img src="photos/events.jpg">
			</div>
			<p class="h4" style="color: white">Events</p>
		</div></a>
		<a href="search.php?srch-term=projects"><div class="card-category " style="background-color: #517693;">
			<div class ="category">
				<img src="photos/projects.jpg">
			</div>
			<p class="h4" style="color: white">Projects</p>
		</div></a>
		<a href="search.php?srch-term=help"><div class="card-category " style="background-color: #B3B3B3;">
			<div class ="category">
				<img src="photos/help.jpg">
			</div>
			<p class="h4" style="color: black">Find Help</p>
		</div></a>
		<a href="search.php?srch-term=post"><div class="card-category" style="background-color: #C6E2FF;">
			<div class ="category">
				<img src="photos/idea.jpg">
			</div>
			<p class="h4" style="color: black;">Posts</p>
		</div></a>
		<a href="search.php?srch-term=buyandsell"><div class="card-category " style="background-color: #567E3A;">
			<div class ="category">
				<img src="photos/buy and sell.jpg">
			</div>
			<p class="h4" style="color: white">Buy and Sell</p>
		</div></a>
		</div>
		
    <br/>
		<p class="h3">Schools<p>
		<hr/>
		<div class="row">
		
	<a href="seecs.php">
		<div class="card seecs-color" style="background-image: url('photos/school-seecs-bg.jpg'); background-repeat: no-repeat; background-position: center center;background-size: cover; background-attachment: fixed; ">
			<div class ="school">
				<img src="photos/seecs.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>SEECS</b>
					<br/>
					SEECS is the School of Electrical Engineering and Computer Science. See what we have to offer.
				</p>
			</div>
		</div>
	</a>

	<a href="sada.php">
		<div class="card " style="background-image: url('photos/school-sada-bg.jpg'); background-repeat: no-repeat; background-position: center center;background-size: cover; background-attachment: fixed; ">
			<div class ="school">
				<img src="photos/sada.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>SADA</b>
					<br/>
					SADA is the School of Art Design and Architecture. Explore us!
				</p>
			</div>
		</div>
	</a>

	<a href="nbs.php">
		<div class="card nbs-color" style="background-image: url('photos/school-nbs-bg.jpg'); background-repeat: no-repeat; background-position: center center;background-size: cover; background-attachment: fixed; ">
			<div class ="school">
				<img src="photos/NBS.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>NBS</b>
					<br/>
					NBS is NUST's Bussiness School. See what we have to offer.
				</p>
			</div>
		</div>
	</a>
	<a href="nice.php">
		<div class="card nice-color" style="background-image: url('photos/school-nice-bg.jpg'); background-repeat: no-repeat; background-position: center center;background-size: cover; background-attachment: fixed; ">
			<div class ="school">
				<img src="photos/nice.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>NICE</b>
					<br/>
					NICE is NUST's Institure of Civil Engineering. Come visit our page.
				</p>
			</div>
		</div>
	</a>

	<a href="smme.php">
		<div class="card smme-color" style="background-image: url('photos/school-smme-bg.jpg'); background-repeat: no-repeat; background-position: center center;background-size: cover; background-attachment: fixed; ">
			<div class ="school">
          <img src="photos/SMME.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>SMME</b>
					<br/>
					SMME is NUST School of Mechanical and Manufacturing Engineering. See what we have to offer.
				</p>
			</div>
		</div>
	</a>
	<a href="igis-ads.html">
		<div class="card " >
			<div class ="school">
				<img src="photos/igis.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>IGIS</b>
					<br/>
					SEECS is the School of Electrical Engineering and Computer Science. See what we have to offer.
				</p>
			</div>
		</div>
	</a>
	
	<a href="iese-ads.html">
		<div class="card " >
			<div class ="school">
				<img src="photos/IESE.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>IESE</b>
					<br/>
					SEECS is the School of Electrical Engineering and Computer Science. See what we have to offer.
				</p>
			</div>
		</div>
	</a>

	<a href="scme-ads.html">
		<div class="card " >
			<div class ="school">
				<img src="photos/scme.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>SCME</b>
					<br/>
					SEECS is the School of Electrical Engineering and Computer Science. See what we have to offer.
				</p>
			</div>
		</div>
	</a>
	<a href="sns-ads.html">
		<div class="card " >
			<div class ="school">
				<img src="photos/sns.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>SNS</b>
					<br/>
					SEECS is the School of Electrical Engineering and Computer Science. See what we have to offer.
				</p>
			</div>
		</div>
	</a>
	<a href="asab-ads.html">
		<div class="card " >
			<div class ="school">
				<img src="photos/ASAB.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>ASAB</b>
					<br/>
					SEECS is the School of Electrical Engineering and Computer Science. See what we have to offer.
				</p>
			</div>
		</div>
	</a>
	<a href="nit-ads.html">
		<div class="card " >
			<div class ="school">
				<img src="photos/nit.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>NIT</b>
					<br/>
					SEECS is the School of Electrical Engineering and Computer Science. See what we have to offer.
				</p>
			</div>
		</div>
	</a>
	<a href="s3h-ads.html">
		<div class="card " >
			<div class ="school">
				<img src="photos/s3h.jpg">
			</div>
			<div class="school-content">
				<p class="h4">
					<b>S3H</b>
					<br/>
					SEECS is the School of Electrical Engineering and Computer Science. See what we have to offer.
				</p>
			</div>
		</div>
	</a>
		
	</div>

    </div>
<div class="col-sm-2" style="background-color: rgba(0,104,139,0.5);height: 100%;">
      <div class="well">
        <p>News</p>
      </div>
      <div class="well">
        <p>News</p>
      </div>
    </div>
</div>
</div>

<!--Including  Footer-->
<?php
  include("footer.php");
?>

</body>
</html>
