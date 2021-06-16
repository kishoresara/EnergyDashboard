<?php
error_reporting(E_ERROR | E_PARSE);
$servername = "127.0.0.1";
$username = "root";
$password = "system91";
$dbname = "Helloworld";
$givenroll = "'" . $_POST['rollno'] . "'";
$givenpass = "'" . $_POST['password'] . "'";
$check = 0;

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
  //echo "connected successfulllly";
}

//$sql = "SELECT firstname, lastname FROM Users WHERE rollno=$givenroll AND password=$givenpass";
$sql = "SELECT Cusname FROM customer WHERE username=$givenroll AND password=$givenpass";

$result = $conn->query($sql);
if($result->num_rows > 0){
$cus_id_sql = "SELECT Cusid FROM customer WHERE username=$givenroll AND password=$givenpass";
$cus_id = $conn->query($cus_id_sql);
$cusid_rpw = $cus_id->fetch_assoc();
$cusidfinal = $cusid_rpw["Cusid"];

//$device_count = "SELECT COUNT(Cusid) FROM customer WHERE "
?>





<!DOCTYPE HTML>

<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main1.css" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300i,400" rel="stylesheet">
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<!--<a href="index.html" class="logo"><strong>Projection</strong> by TEMPLATED</a>-->
					<a  class="logo icon fa-recycle" style="color:white;font-size: 26px"> <em style="color:lightgreen;font-size: 30px">Z</em>eus</a>
					<nav id="nav">
						<a href="NavBarHrefs/Devices/maps.php?cusidd=<?php echo $cusidfinal; ?>">Map</a>
            <a href="NavBarHrefs/Devices/export3.php?cusidd=<?php echo $cusidfinal; ?>">export!</a>
						<!--<a href="NavBarHrefs/Devices/devices.html">My devices</a> -->
            <a href="NavBarHrefs/Devices/devices.php?cusidd=<?php echo $cusidfinal; ?>">My devices</a>
						<a href="NavBarHrefs/Devices/profile.php?cusidd=<?php echo $cusidfinal; ?>">Profile</a>
            <a href="../Homepage/index.html">Log out</a>
					</nav>
					<a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
				</div>
			</header>

		<!-- Banner -->
			<section id="banner">
				<div class="inner">
					<header>
						<h1>Welcome to Dashboard.</h1>
						<h3>
          					<?php
            					while($row = $result->fetch_assoc()) {
                        
              						//echo  $row["firstname"]. " " . $row["lastname"];
              						echo  $row["Cusname"]. "!";
                          //echo  "brh". $cusid_rpw["Cusid"];
            					}
          					?>
        				</h3>
					</header>



					       <div class="container1">
<?php 
//for ($x = 0; $x < 1; $x++) {
$sqldevice = "SELECT * FROM devices where Cusid=$cusidfinal";
$ValuefilledB = "filledbar";
$resultdevice = mysqli_query($conn,$sqldevice);

while ($roww = mysqli_fetch_array($resultdevice, MYSQLI_ASSOC)) {

  if ($roww["Elevel"] > 89 & $roww["Elevel"] < 100) {
    $ValuefilledB = "filledbar1";
  }

  else if ($roww["Elevel"] > 79 & $roww["Elevel"] < 90) {
    $ValuefilledB = "filledbar2";
  }

  else if ($roww["Elevel"] > 69 & $roww["Elevel"] < 80) {
    $ValuefilledB = "filledbar3";
  }

  else if ($roww["Elevel"] > 59 & $roww["Elevel"] < 70) {
    $ValuefilledB = "filledbar4";
  }

  else if ($roww["Elevel"] >49 & $roww["Elevel"] < 60) {
    $ValuefilledB = "filledbar5";
  }

  else if ($roww["Elevel"] > 39 & $roww["Elevel"] < 50) {
    $ValuefilledB = "filledbar6";
  }

  else if ($roww["Elevel"] > 29 & $roww["Elevel"] < 40) {
    $ValuefilledB = "filledbar7";
  }

  else if ($roww["Elevel"] > 19 & $roww["Elevel"] < 30) {
    $ValuefilledB = "filledbar8";
  }

  else if ($roww["Elevel"] > 0 & $roww["Elevel"] < 20) {
    $ValuefilledB = "filledbar9";
  }
  else {
    $ValuefilledB = "filledbar8";
  }




  //echo $roww["Elevel"];
  ?>
  <div class="card">
    <h3 class="title">  
      <?php 
        echo $roww["Dtype"];

      ?>
       </h3>
    <p class="titledid">
      <?php
        echo "#".$roww["Deviceid"];        

      ?>
    </p>
    <p class="eleveltext">Energy Levels:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <?php
      echo $roww["Elevel"]."%";
      ?>
  </p> 
    <div class="bar">
      <div class="emptybar"></div>
      <div class=<?php echo $ValuefilledB ?> ></div>
      <p class="effectext">Effeciency:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      <?php 
        echo $roww["Effeciency"]."%";

      ?>

    </p>

    </div>

    <div class="circle">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg">

      <circle class="stroke" cx="60" cy="60" r="50"/>
    </svg>
    </div>
  </div>
<?php
}
?>


<!--
  <div class="card">
    <h3 class="title">Hydro</h3>
     <p class="titledid">#12345</p>
    <p class="eleveltext">Energy Levels:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;60%</p> 
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar1"></div>
      <p class="effectext">Effeciency:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 40%</p>
    </div>
    <div class="circle">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
      <circle class="stroke" cx="60" cy="60" r="50"/>

    </svg>
    </div>
  </div>

-->

<!--

  <div class="card">
    <h3 class="title">Thermo</h3>
     <p class="titledid">#12345</p>
    <p class="eleveltext">Energy Levels:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;50%</p> 
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar2"></div>
      <p class="effectext">Effeciency:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 40%</p>
    </div>
    <div class="circle">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
      <circle class="stroke" cx="60" cy="60" r="50">

      </circle>

    </svg>
    </div>
  </div>

-->
<!--

  <div class="card">
    <h3 class="title">Wind</h3>
     <p class="titledid">#12345</p>
    <p class="eleveltext">Energy Levels:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;40%</p> 
    <div class="bar">
      <div class="emptybar"></div>
      <div class="filledbar3"></div>
      <p class="effectext">Effeciency:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 40%</p>
    </div>
    <div class="circle">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg">
      <circle class="stroke" cx="60" cy="60" r="50"/>
    </svg>
    </div>
  </div>
-->



</div>



<!--
					<div class="flex ">

						<div>
							<span class="icon fa-car"></span>
							<h3>Aliquam</h3>
							<p>Suspendisse amet ullamco</p>
						</div>

						<div>
							<span class="icon fa-camera"></span>
							<h3>Elementum</h3>
							<p>Class aptent taciti ad litora</p>
						</div>

						<div>
							<span class="icon fa-bug"></span>
							<h3>Ultrices</h3>
							<p>Nulla vitae mauris non felis</p>
						</div>
-->
					</div>

					<footer>
						<a href="#" class="button">Get Started</a>
					</footer>
				</div>
			</section>


	
		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>













<?php
	}
else {
	//echo "nah bruh we aint got that";



	?>



<!DOCTYPE html>
<html>
<title>Invalid Credentials</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/w3css1.css">
<link rel="stylesheet" href="css/googleapicss.css">
<style>
body,h1 {font-family: "Arial", sans-serif}
body, html {height: 100%}
.bgimg { 
  background-image: url('images/bg-03.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
/* The navigation bar */
.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed; /* Set the navbar to fixed position */
  top: 0;
  left: 0;
  right: 0; /* Position the navbar at the top of the page */
  width: 100%;
  margin-right: 0; /* Full width */
}

/* Links inside the navbar */
.navbar a {
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  margin: auto;
}

.navbar b {
  font: sans-serif;
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: left;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change background on mouse-over */
.navbar a:hover {
  background: #ddd;
  color: black;
}

.navbar b:hover {
  background: #ddd;
  color: black;
}

/* Main content */
.main {
  margin: auto;
  margin-top: 0px;
  padding: 0; /* Add a top margin to avoid content overlay */
}

</style>
<!--
<div class="navbar">
  <b href="#home">Home</b> 
  <a href="index.html">Login</a>
  <a href="#contact">Contact</a> 
</div>
-->
<body style="padding-right: 0px;padding-left: 0px;">



<div class="bgimg w3-display-container w3-animate-opacity w3-text-white main">
  <div class="w3-display-middle">
        <h1 class="w3-jumbo w3-animate-top">SORRY!</h1>
        <hr class="w3-border-grey" style="margin:auto;width:40%">
        <p class="w3-large w3-center">Invalid Credentials</p>
        
  </div>
</div>
</body>
</html>
































<?php
}	

?>

<!--
<!DOCTYPE html>
<html>
<title>Logged In!</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/w3css1.css">
<link rel="stylesheet" href="css/googleapicss.css">
<style>
body,h1 {font-family: "Arial", sans-serif}
body, html {height: 100%}
.bgimg { 
  background-image: url('images/bg-03.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
/* The navigation bar */
.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed; /* Set the navbar to fixed position */
  top: 0;
  left: 0;
  right: 0; /* Position the navbar at the top of the page */
  width: 100%;
  margin-right: 0; /* Full width */
}

/* Links inside the navbar */
.navbar a {
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  margin: auto;
}

.navbar b {
  font: sans-serif;
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: left;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change background on mouse-over */
.navbar a:hover {
  background: #ddd;
  color: black;
}

.navbar b:hover {
  background: #ddd;
  color: black;
}

/* Main content */
.main {
  margin: auto;
  margin-top: 30px;
  padding: 0; /* Add a top margin to avoid content overlay */
}

</style>
<div class="navbar">
  <b href="#home">Home</b>
  <a href="index.html">Logout</a>
  
</div>
<body style="padding-right: 0px;padding-left: 0px;">



<?php
///error_reporting(E_ERROR | E_PARSE);
//$servername = "127.0.0.1";
//$username = "root";
//$password = "system91";
//$dbname = "Helloworld";
//$givenroll = "'" . $_POST['rollno'] . "'";
//$givenpass = "'" . $_POST['password'] . "'";

// Create connection
//$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
//if (!$conn) {
  //  die("Connection failed: " . mysqli_connect_error());
//}
//else{
  //echo "connected successfulllly";
//}

//$sql = "SELECT firstname, lastname FROM Users WHERE rollno=$givenroll AND password=$givenpass";
//$sql = "SELECT Cusname FROM customer WHERE username=$givenroll AND password=$givenpass";

//$result = $conn->query($sql);

?>
<div class="bgimg w3-display-container w3-animate-opacity w3-text-white main">
  <div class="w3-display-middle">
    <?php
      //if($result->num_rows > 0){
        ?>
        <h1 class="w3-jumbo w3-animate-top">WELCOME</h1>
        <hr class="w3-border-grey" style="margin:auto;width:40%">
        <p class="w3-large w3-center">
          <br>
          <?php
            //while($row = $result->fetch_assoc()) {
              //echo  $row["firstname"]. " " . $row["lastname"];
            	//echo  $row["Cusname"]. " Bruh";
            //}
          ?>
        </p>
      <?php
      //}
      //else{
        //?>
        <h1 class="w3-jumbo w3-animate-top">SORRY!</h1>
        <hr class="w3-border-grey" style="margin:auto;width:40%">
        <p class="w3-large w3-center">Invalid Credentials</p>
        <?php
      //}
    ?>
  </div>
</div>
</body>
</html>

-->

<!--
<!DOCTYPE html>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: margin-box;
  padding-right: 0;
  padding-left: 0;
  margin: auto;
  left: 0;

}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #828384;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 9900px) {
  .leftcolumn, .rightcolumn {   
    padding-right: 0;
    padding-left: 0;
    width: 100%;
    padding: 0;
  }
}
</style>
</head>
<body>

<div class="header">
  <h2>Blog Name</h2>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>TITLE HEADING</h2>
      <h5>Title description, Dec 7, 2017</h5>
      <div class="fakeimg" style="height:200px;">Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
    <div class="card">
      <h2>TITLE HEADING</h2>
      <h5>Title description, Sep 2, 2017</h5>
      <div class="fakeimg" style="height:200px;">Image</div>
      <p>Some text..</p>
      <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div>
    <div class="card">
      <h3>Popular Post</h3>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>

</body>
</html>




 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>Mini Blog</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="miniblog/fonts/icomoon/style.css">
    <link rel="stylesheet" href="miniblog/css/bootstrap.min.css">
    <link rel="stylesheet" href="miniblog/css/magnific-popup.css">
    <link rel="stylesheet" href="miniblog/css/jquery-ui.css">
    <link rel="stylesheet" href="miniblog/css/owl.carousel.min.css">
    <link rel="stylesheet" href="miniblog/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="miniblog/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="miniblog/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="miniblog/css/aos.css">
    <link rel="stylesheet" href="miniblog/css/style.css">
  </head>
  <body>
  
  <div class="site-wrap">
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" role="banner">
      <div class="container-fluid">
        <div class="row align-items-center">
          
          <div class="col-12 search-form-wrap js-search-form">
            <form method="get" action="#">
              <input type="text" id="s" class="form-control" placeholder="Search...">
              <button class="search-btn" type="submit"><span class="icon-search"></span></button>
            </form>
          </div>
          <div class="col-4 site-logo">
            <a href="miniblog/index.html" class="text-black h2 mb-0">Mini Blog</a>
          </div>
          <div class="col-8 text-right">
            <nav class="site-navigation" role="navigation">
              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
                <li><a href="miniblog/category.html">Home</a></li>
                <li><a href="miniblog/category.html">Politics</a></li>
                <li><a href="miniblog/category.html">Tech</a></li>
                <li><a href="miniblog/category.html">Entertainment</a></li>
                <li><a href="miniblog/category.html">Travel</a></li>
                <li><a href="miniblog/category.html">Sports</a></li>
                <li class="d-none d-lg-inline-block"><a href="#" class="js-search-toggle"><span class="icon-search"></span></a></li>
              </ul>
            </nav>
            <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a></div>
          </div>
      </div>
    </header>
    
    
    <div class="site-section bg-light">
      <div class="container">
        <div class="row align-items-stretch retro-layout-2">
          <div class="col-md-4">
            <a href="miniblog/single.html" class="h-entry mb-30 v-height gradient" style="background-image: url('miniblog/images/img_1.jpg');">
              
              <div class="text">
                <h2>The AI magically removes moving objects from videos.</h2>
                <span class="date">July 19, 2019</span>
              </div>
            </a>
            <a href="miniblog/single.html" class="h-entry v-height gradient" style="background-image: url('miniblog/images/img_2.jpg');">
              
              <div class="text">
                <h2>The AI magically removes moving objects from videos.</h2>
                <span class="date">July 19, 2019</span>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="miniblog/single.html" class="h-entry img-5 h-100 gradient" style="background-image: url('miniblog/images/img_v_1.jpg');">
              
              <div class="text">
                <div class="post-categories mb-3">
                  <span class="post-category bg-danger">Travel</span>
                  <span class="post-category bg-primary">Food</span>
                </div>
                <h2>The AI magically removes moving objects from videos.</h2>
                <span class="date">July 19, 2019</span>
              </div>
            </a>
          </div>
          <div class="col-md-4">
            <a href="miniblog/single.html" class="h-entry mb-30 v-height gradient" style="background-image: url('miniblog/images/img_3.jpg');">
              
              <div class="text">
                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                <span class="date">July 19, 2019</span>
              </div>
            </a>
            <a href="miniblog/single.html" class="h-entry v-height gradient" style="background-image: url('miniblog/images/img_4.jpg');">
              
              <div class="text">
                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                <span class="date">July 19, 2019</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-12">
            <h2>Recent Posts</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="miniblog/single.html"><img src="miniblog/images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3">Politics</span>
              <h2><a href="miniblog/single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="miniblog/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="miniblog/single.html"><img src="miniblog/images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-success mb-3">Nature</span>
              <h2><a href="miniblog/single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="miniblog/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="miniblog/single.html"><img src="miniblog/images/img_3.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-warning mb-3">Travel</span>
              <h2><a href="miniblog/single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="miniblog/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="miniblog/single.html"><img src="miniblog/images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-secondary mb-3">Politics</span>
              <h2><a href="miniblog/single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="miniblog/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="miniblog/single.html"><img src="miniblog/images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-success mb-3">Nature</span>
              <h2><a href="miniblog/single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="miniblog/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="miniblog/single.html"><img src="miniblog/images/img_4.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-danger mb-3">Sports</span>
              <h2><a href="miniblog/single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="miniblog/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="miniblog/single.html"><img src="miniblog/images/img_1.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-success mb-3">Nature</span>
              <h2><a href="miniblog/single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="miniblog/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="miniblog/single.html"><img src="miniblog/images/img_2.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-danger mb-3">Sports</span>
              <span class="post-category text-white bg-secondary mb-3">Tech</span>
              <h2><a href="miniblog/single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="miniblog/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="miniblog/single.html"><img src="miniblog/images/img_4.jpg" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-danger mb-3">Sports</span>
              <span class="post-category text-white bg-warning mb-3">Lifestyle</span>
              <h2><a href="miniblog/single.html">The AI magically removes moving objects from videos.</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="miniblog/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">Carrol Atkinson</a></span>
                <span>&nbsp;-&nbsp; July 19, 2019</span>
              </div>
              
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo sunt tempora dolor laudantium sed optio, explicabo ad deleniti impedit facilis fugit recusandae! Illo, aliquid, dicta beatae quia porro id est.</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row text-center pt-5 border-top">
          <div class="col-md-12">
            <div class="custom-pagination">
              <span>1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <span>...</span>
              <a href="#">15</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-light">
      <div class="container">
        <div class="row align-items-stretch retro-layout">
          
          <div class="col-md-5 order-md-2">
            <a href="miniblog/single.html" class="hentry img-1 h-100 gradient" style="background-image: url('miniblog/images/img_4.jpg');">
              <span class="post-category text-white bg-danger">Travel</span>
              <div class="text">
                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                <span>February 12, 2019</span>
              </div>
            </a>
          </div>
          <div class="col-md-7">
            
            <a href="miniblog/single.html" class="hentry img-2 v-height mb30 gradient" style="background-image: url('miniblog/images/img_1.jpg');">
              <span class="post-category text-white bg-success">Nature</span>
              <div class="text text-sm">
                <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                <span>February 12, 2019</span>
              </div>
            </a>
            
            <div class="two-col d-block d-md-flex">
              <a href="miniblog/single.html" class="hentry v-height img-2 gradient" style="background-image: url('miniblog/images/img_2.jpg');">
                <span class="post-category text-white bg-primary">Sports</span>
                <div class="text text-sm">
                  <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                  <span>February 12, 2019</span>
                </div>
              </a>
              <a href="miniblog/single.html" class="hentry v-height img-2 ml-auto gradient" style="background-image: url('miniblog/images/img_3.jpg');">
                <span class="post-category text-white bg-warning">Lifestyle</span>
                <div class="text text-sm">
                  <h2>The 20 Biggest Fintech Companies In America 2019</h2>
                  <span>February 12, 2019</span>
                </div>
              </a>
            </div>  
            
          </div>
        </div>
      </div>
    </div>
    <div class="site-section bg-lightx">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-md-5">
            <div class="subscribe-1 ">
              <h2>Subscribe to our newsletter</h2>
              <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
              <form action="#" class="d-flex">
                <input type="text" class="form-control" placeholder="Enter your email address">
                <input type="submit" class="btn btn-primary" value="Subscribe">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
    <div class="site-footer">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Placeat reprehenderit magnam deleniti quasi saepe, consequatur atque sequi delectus dolore veritatis obcaecati quae, repellat eveniet omnis, voluptatem in. Soluta, eligendi, architecto.</p>
          </div>
          <div class="col-md-3 ml-auto">
            <ul class="list-unstyled float-left mr-5">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Advertise</a></li>
              <li><a href="#">Careers</a></li>
              <li><a href="#">Subscribes</a></li>
            </ul>
            <ul class="list-unstyled float-left">
              <li><a href="#">Travel</a></li>
              <li><a href="#">Lifestyle</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Nature</a></li>
            </ul>
          </div>
          <div class="col-md-4">
            
            <div>
              <h3 class="footer-heading mb-4">Connect With Us</h3>
              <p>
                <a href="#"><span class="icon-facebook pt-2 pr-2 pb-2 pl-0"></span></a>
                <a href="#"><span class="icon-twitter p-2"></span></a>
                <a href="#"><span class="icon-instagram p-2"></span></a>
                <a href="#"><span class="icon-rss p-2"></span></a>
                <a href="#"><span class="icon-envelope p-2"></span></a>
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <p>
              Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
              </p>
          </div>
        </div>
      </div>
    </div>
    
  </div>
  <script src="miniblog/js/jquery-3.3.1.min.js"></script>
  <script src="miniblog/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="miniblog/js/jquery-ui.js"></script>
  <script src="miniblog/js/popper.min.js"></script>
  <script src="miniblog/js/bootstrap.min.js"></script>
  <script src="miniblog/js/owl.carousel.min.js"></script>
  <script src="miniblog/js/jquery.stellar.min.js"></script>
  <script src="miniblog/js/jquery.countdown.min.js"></script>
  <script src="miniblog/js/jquery.magnific-popup.min.js"></script>
  <script src="miniblog/js/bootstrap-datepicker.min.js"></script>
  <script src="miniblog/js/aos.js"></script>
  <script src="miniblog/js/main.js"></script>
  </body>
</html>
-->