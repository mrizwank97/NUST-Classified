<?php
session_start();
if(isset($_SESSION['email'])){
	$name = $_SESSION['name'];
}
include_once(".\config\config1.php");


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
<html>
<head>
	<title>Form</title>
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
<body>
<nav class="navbar navbar-inverse" style="background:#00688b">
        <div class="container-fluid">
            <!-- Logo -->
            <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
                	<span class="icon-bar"></span>
					<span class="icon-bar"></span>
                	<span class="icon-bar"></span>
            	</button>
                <a href="home.html" class ="navbar-brand" style="color: #FFFFFF"> NUST Classified </a>
            </div>
            <!-- Menu Items -->
            <div class="collapse navbar-collapse" id="mainNavBar">
                <ul class="nav navbar-nav">
                    <li><a href="home.php" style="color: #FFFFFF">Home</a></li>
                    <li><a href="schools.php" style="color: #FFFFFF">Schools</a></li>
                    <li><a href="hostel.php" style="color: #FFFFFF">Hostels</a></li>
					<li><a href="#" style="color: #FFFFFF">Socities</a></li>
					<li ><a href="about-us.php" style="color: #FFFFFF">About Us</a></li>
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
                      <form id="sign_in" class="form-horizontal" action="form.php" role="form" method="POST" >
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
                      <form id="loginform" class="form-horizontal" action="form.php" role="form" method="POST">
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
						<form action="form.php" class="form-horizontal" role="form" style="margin-top:5px;" method="POST">
							<button id="btn-login"  type="submit" name="logout"  class="btn btn-block btn-success">Logout</button>
						</form>
					</li>
				</ul>
			</li>';			
		  }
		  ?>
        </ul>
    </div>
  </div>
</nav>
<div class="container-fluid text-center">    
  <div class="row content">
    
    <!--Adding Side Navigation Bar-->
    <?php
      include("sidenav.php")
    ?>

	<div class="col-sm-8 text-left">
	<div class="about-container">
	<form method="post" enctype="multipart/form-data">
		<div class="row">
			<div class="col-25">
				<label for="fname">Name:</label>
			</div>
			<div class="col-75">
				<input type="text" name="username" required>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="email">Email:</label>
			</div>
			<div class="col-75">
				<input type="text" name="email" required>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="phone">Phone Number:</label>
			</div>
			<div class="col-75">
				<input type="text" name="phone" required>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="country">Chose Target: <br/>(Your ad will be posted on that page)</label>
			</div>
			<div class="col-75">
				<select name = "target">
					<optgroup label="Schools">
	  					<option value="seecs">SEECS</option>
	  					<option value="sada">SADA</option>
	  					<option value="nbs">NBS</option>
	  					<option value="nice">NICE</option>
	   					<option value="smme">SMME</option>
	  					<option value="igis">IGIS</option>
	  					<option value="iese">IESE</option>
	  					<option value="scme">SCME</option>
	  					<option value="sns">SNS</option>
	  					<option value="asab">ASAB</option>
	   					<option value="nit">NIT</option>
	  					<option value="s3h">S3h</option>
  					</optgroup>
  					<optgroup label="Hostels">
	  					<option value="hostel">All Hostel</option>  							
	  				</optgroup>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="country">Chose Category: </label>
			</div>
			<div class="col-75">
				<select name = "category">
					<optgroup label="School Category">
	  					<option value="education">Education</option>
						<option value="events">Events</option>
	  					<option value="projects">Projects</option>
	  					<option value="help">Find Help</option>
	   					<option value="post">Post</option>
	  					<option value="buyandsell">Buy & Sell</option>
  					</optgroup>
  					<optgroup label="Hostel Category">
	  					<option value="roomswap">Room Swap</option>
	  					<option value="hostelstay">Hostel Stay</option>
	  					<option value="roomcooler">Room Coolers</option>
	  					<option value="refrigerator">Refrigerators</option>
	   					<option value="electronics">Electronics</option>
	  					<option value="other">Other Products</option>
  					</optgroup>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="lname">Title of your Ad:</label>
			</div>
			<div class="col-75">
				<input type="text" name="title" required>
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="phone">Price:</label>
			</div>
			<div class="col-75">
				<input type="text" name="price">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="lname">Explain your ad briefly:</label>
			</div>
			<div class="col-75">
				<input type="text" name="content" required style="height: 150px">
			</div>
		</div>
		<div class="row">
			<div class="col-25">
				<label for="lname">Upload picture:</label>
			</div>
			<div class="col-75">
				<input type="file" name="image">
			</div>
		</div>
		<div class="row">
				<input class="col-25" type="submit" name="submit" value="Submit">
		</div>
	</form>
	</div>
	</div>
	<div class="col-sm-2 sidenav">
      <div class="well">
        <p>ADS</p>
      </div>
      <div class="well">
        <p>ADS</p>
      </div>
    </div>
	</div>
</div>

	<?php

		function get_file_extension( $file )  {
			if( empty( $file ) )
			return;

			// if goes here then good so all clear and good to go
			$ext = explode( ".", $file );
			$ext =  end($ext);

			// return file extension
			return $ext;
		}

	
		if(isset($_POST['submit'])){
			$mysqli = mysqli_connect('localhost','root','','database');
			$target = mysqli_real_escape_string($mysqli,$_POST['target']);
			$username = mysqli_real_escape_string($mysqli,$_POST['username']);
			$email = mysqli_real_escape_string($mysqli,$_POST['email']);
	    	$phone = mysqli_real_escape_string($mysqli,$_POST['phone']);
	    	$category = $_POST['category'];
			$title = mysqli_real_escape_string($mysqli,$_POST['title']);
			$price = mysqli_real_escape_string($mysqli, $_POST['price']);
			$content = mysqli_real_escape_string($mysqli,$_POST['content']);
			if(getimagesize($_FILES['image']['tmp_name']) == FALSE){
				echo '<script>alert("Please select a JPG/JPEG File.");</script>';
			}
			else{

				$image = addslashes($_FILES['image']['tmp_name']);
				$name = addslashes($_FILES['image']['name']);
				$image = file_get_contents($image);
				$image = base64_encode($image);

				//Resizing Part

				$filename = stripslashes( $_FILES['image']['name'] );
				$ext = get_file_extension( $filename );
				$ext = strtolower( $ext );

				
				if(( $ext != "jpg" ) && ( $ext != "jpeg" ) && ( $ext != "png" ) && ( $ext != "gif" ) ) {
					 echo '<script>alert("Invalid File! Please select a JPG/JPEG File.");</script>';
					return false;
				} 
				else {
					// get uploaded file size
					$size = filesize( $_FILES['image']['tmp_name'] );

					// get php ini settings for max uploaded file size
					$max_upload = ini_get( 'upload_max_filesize' );

					// check if we're able to upload lessthan the max size
					if( $size > $max_upload )
						//echo 'You have exceeded the upload file size.';

					// check uploaded file extension if it is jpg or jpeg, otherwise png and if not then it goes to gif image conversion
					$uploaded_file = $_FILES['image']['tmp_name'];
					if( $ext == "jpg" || $ext == "jpeg" )
					$source = imagecreatefromjpeg( $uploaded_file );
					else if( $ext == "png" )
					$source = imagecreatefrompng( $uploaded_file );
					else
					$source = imagecreatefromgif( $uploaded_file );


					// getimagesize() function simply get the size of an image
					list( $width, $height) = getimagesize( $uploaded_file );

					
					// new width 50(this is in pixel format)
					$nw = 250;
					$nh = 250;
					$dst = imagecreatetruecolor( $nw, $nh );

					// new width 100 in pixel format too

					imagecopyresampled( $dst, $source, 0, 0, 0,0, $nw, $nh, $width, $height );

					// rename our upload image file name, this to avoid conflict in previous upload images
					// to easily get our uploaded images name we added image size to the suffix
					$rnd_name = 'photos_'.uniqid(mt_rand(10, 15)).'_'.time().'_250x250.'.$ext;

					// move it to uploads dir with full quality
					imagejpeg( $dst, 'uploads/'.$rnd_name, 100 );

					// I think that's it we're good to clear our created images
					imagedestroy( $source );
					imagedestroy( $dst );

					/*Address of the resized picture*/

					$rnd_name = "uploads/" . $rnd_name;

				}

				//Saving 
				saveimage($username,$email,$phone,$target,$category,$title,$price,$content,$rnd_name);

				//to delete new imaeg created
				//unlink($rnd_name);

	}
				//displayimage();

			}

		function saveimage($username,$email,$phone,$target,$category,$title,$price,$content,$imagelocation){
			$mysqli = mysqli_connect('localhost','root','','database'); 
			$qry = "insert into addata(name,email,phone,target,category,title,price,content,picture) values ('$username' , '$email' , '$phone' , '$target' , '$category' , '$title' ,'$price', '$content' , '$imagelocation' )";
			$targetPage = $target.".php";
			$result = mysqli_query($mysqli,$qry);
			if($result){

				echo "Image Uploaded";
				echo "$targetPage";
				echo "<script type='text/javascript'>alert('Your ad has been posted!');
						window.location.href='$targetPage';
					  </script>";
			}
			else{
				echo "FAILED";
			}
		}
		function displayimage(){
			$mysqli = mysqli_connect('localhost','root','','database'); 
			$qry = "select * from addata";
			$result = mysqli_query($mysqli,$qry);
			while($row = mysqli_fetch_array($result)){
				echo "<img src = \" ".($row['picture'])."\">";
			}
			$mysqli->close();
		}
	?>
	
<!--Including  Footer-->
<?php
  include("footer.php");
?>

</body>
</html>