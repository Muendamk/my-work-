
<?php 
 
include './admin/artists/connect.php';

//EMAIL VERIFICATION//
if (isset($_GET['token'])) {
  $token = $_GET['token'];
  verifyUser($token);
}
$users = selectAll($table);
$curr_user = $_SESSION['id'];
if(!isset($_SESSION['id'])){

  header('location:login.php');}
//PASSWORD RSET//
if (isset($_GET['password-token'])) {
  $passwordToken = $_GET['password-token'];
  resetPassword($passwordToken);
}

//EMAIL CHANGE//
if (isset($_GET['email-token'])) {
  $emailToken = $_GET['email-token'];
  resetEmail($emailToken);
}


//SENDING EMAIL WHEN PASSWORD CAHNGES//
if (isset($_GET['changePassword-token'])) {
  $emailToken = $_GET['changePassword-token'];
  resetchangePassword($changePasswordToken);
}
$album_songs = array();
$videos= array();

$postsTitle = 'Recent Posts';


  //dd($_POST);


if (isset($_GET['t_id'])) {
  $posts = getPostsByTopicId($_GET['t_id']);
    $postsTitle = "You searched for posts under '" . $_GET['title'] . "'";
}else{
  if (isset($_POST['search-term'])){
    $postsTitle = "You searched for '" . $_POST['search-term'] . "'";
    $posts = searchPosts($_POST['search-term']);
    $videos = searchPosts($_POST['search-term']);
  }else{
    $posts =  getPublishedposts();
  }
}



  //dd($_POST);




if (isset($_GET['t_id'])) {
	$posts = getPostsByMoodId($_GET['t_id']);
	  $postsTitle = "You searched for posts under '" . $_GET['title'] . "'";
  }else{
	if (isset($_POST['search-term'])){
	  $postsTitle = "You searched for '" . $_POST['search-term'] . "'";
	  $posts = searchPosts($_POST['search-term']);
	  $videos = searchPosts($_POST['search-term']);
	}else{
	  $posts =  getPublishedposts();
	}
  }

  if (isset($_GET['t_id'])) {
	$posts = getPostsByGenreId($_GET['t_id']);
	  $postsTitle = "You searched for posts under '" . $_GET['title'] . "'";
  }else{
	if (isset($_POST['search-term'])){
	  $postsTitle = "You searched for '" . $_POST['search-term'] . "'";
	  $posts = searchPosts($_POST['search-term']);
	  $videos = searchPosts($_POST['search-term']);
	}else{
	  $posts =  getPublishedposts();
	}
  }
  $query = "SELECT * FROM music  ";
  //$query = "SELECT * FROM posts WHERE id = $_SESSION[id]";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  $res = $stmt->get_result();
  
$sql = "SELECT * FROM artists";

$result = mysqli_query($conn, $sql);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);


$sql = "SELECT * FROM music ORDER BY created_at desc";

$result = mysqli_query($conn, $sql);
$fav = mysqli_fetch_all($result, MYSQLI_ASSOC);

//$sql = "SELECT * FROM album";

//$result = mysqli_query($conn, $sql);
//$album = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM genres";

$result = mysqli_query($conn, $sql);
$genres = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = "SELECT * FROM song_mood";

$result = mysqli_query($conn, $sql);
$moods = mysqli_fetch_all($result, MYSQLI_ASSOC);


$sql = "SELECT * FROM albums having count(*) > 2";

$result = mysqli_query($conn, $sql);
$album_songs = mysqli_fetch_all($result, MYSQLI_ASSOC);

$users = selectAll($table);
//$curr_user = $_SESSION['id'];

//$id = $_GET['id'];

/*$p_id = $_GET['id'];
//$visitor_ip= $_SERVER['REMOTE_ADDR'];
$query = "SELECT * FROM counter_table WHERE  post_id ='$p_id' ";
$result=mysqli_query($conn, $query);

if(!$result) {
    die("retrive error <br>" .$query);
}
$total_visitors=mysqli_num_rows($result);
//if ($total_visitors<1){
  //  $query = "INSERT INTO counter_table(ip_address,post_id) VALUES ('$visitor_ip', '$id')";
    //$result=mysqli_query($conn, $query);

//}


$sql ="SELECT count(post_id) AS total FROM counter_table WHERE post_id ='$id'";
$result = mysqli_query($conn, $sql);
 // output data of each row
$values= mysqli_fetch_assoc($result);
$num_rows=$values['total'];

//echo $num_rows;

if(!$result) {
    die("retrive error <br>" .$query);
}
$total_visitors=mysqli_num_rows($result);
*/
?>
<!DOCTYPE HTML>
<html>
<head>
<title>theWave.</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="My Play Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' media="all" />
<!-- //bootstrap -->
<link href="css/dashboard.css" rel="stylesheet">
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
<!--start-smoth-scrolling-->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
<!-- //fonts -->
</head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><h1>theWave.</h1></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
			<div class="top-search">
				<form class="navbar-form navbar-right">
					<input type="text" class="form-control" placeholder="Search...">
					<input type="submit" value=" ">
				</form>
			</div><?php if (isset($_SESSION['id'])):?>
			<div class="header-top-right">
				<div class="file">
					<a href="dashboard.php">Upload</a>
					<a href="#">	Hello! <?php echo $_SESSION['username']; ?></a>
					<a href="logout.php">Logout</a>
				</div>	<?php else: ?>	
					
				
				<div class="signin">
					<a href="signup.php">Sign Up</a>
			
				</div>
				<div class="signin">
					<a href="login.php">Sign In</a>
				
			</div><?php endif; ?> 
        </div>
		<div class="clearfix"> </div>
      </div>
    </nav>
	
        <div class="col-sm-3 col-md-2 sidebar">
			<div class="top-navigation">
				<div class="t-menu">MENU</div>
				<div class="t-img">
					<img src="images/lines.png" alt="" />
				</div>
				<div class="clearfix"> </div>
			</div>
				<div class="drop-navigation drop-navigation">
				  <ul class="nav nav-sidebar">
					<li class="active"><a href="index.html" class="home-icon"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
					<li><a href="#" class="user-icon"><span class="glyphicon glyphicon-home glyphicon-blackboard" aria-hidden="true"></span>Podcast & Radio</a></li>
					<li><a href="history.html" class="sub-icon"><span class="glyphicon glyphicon-home glyphicon-hourglass" aria-hidden="true"></span>History</a></li>
					<li><a href="#" class="menu1"><span class="glyphicon glyphicon-film" aria-hidden="true"></span>Genre<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-2">
							<li><a href="movies.html">Hip Hop</a></li>                                             
							<li><a href="#">House</a></li>
							<li><a href="#">Amapiano</a></li> 
							<li><a href="#">Afro Pop</a></li> 
						</ul>
						<!-- script-for-menu -->
						<script>
							$( "li a.menu1" ).click(function() {
							$( "ul.cl-effect-2" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					<li><a href="#" class="menu"><span class="glyphicon glyphicon-film glyphicon-sunglass" aria-hidden="true"></span>Moods<span class="glyphicon glyphicon-menu-down" aria-hidden="true"></span></a></li>
						<ul class="cl-effect-1">
							<li><a href="#">Happy</a></li>                                             
							<li><a href="#">Sad</a></li>
							<li><a href="#">Alone</a></li> 
							<li><a href="#">Turn Up</a></li>  
						</ul>
						<!-- script-for-menu -->
						<script>
							$( "li a.menu" ).click(function() {
							$( "ul.cl-effect-1" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					<li><a href="#" class="song-icon"><span class="glyphicon glyphicon-music" aria-hidden="true"></span>Songs</a></li>
					<li><a href="#" class="news-icon"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>News</a></li>
				  </ul>
				  <!-- script-for-menu -->
						<script>
							$( ".top-navigation" ).click(function() {
							$( ".drop-navigation" ).slideToggle( 300, function() {
							// Animation complete.
							});
							});
						</script>
					<div class="side-bottom">
						<div class="side-bottom-icons">
							<ul class="nav2">
								<li><a href="#" class="facebook"> </a></li>
								<li><a href="#" class="facebook twitter"> </a></li>
								<li><a href="#" class="facebook chrome"> </a></li>
								<li><a href="#" class="facebook dribbble"> </a></li>
							</ul>
						</div>
						<div class="copyright">
							<p>Copyright © 2021 theWave. All Rights Reserved | Design by theBox.</a></p>
						</div>
					</div>
				</div>
        </div>

		<!--start-->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<div class="main-grids">
				<div class="top-grids">
					<div class="recommended-info">
						<h3>Recent </h3>
					</div><?php foreach ($album_songs as $post):?>
					<div class="col-md-4 resent-grid recommended-grid slider-top-grids">
						<div class="resent-grid-img recommended-grid-img">
							<a href="single.php?id=<?php echo $post['album_id'];?>"><img src="<?php echo 'admin/albums/poster/' . $post['image']; ?>" alt="" /></a>
							<div class="time">
								<p>3:04</p>
							</div>
							<div class="clck">
								<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
							</div>
						</div>
						<div class="resent-grid-info recommended-grid-info">
							<h3><a href="single.html" class="title title-info"><?php echo $post['fname'];?></a></h3>
							<ul>
								<li><p class="author author-info"><a href="#" class="author">Mizophyll</a></p></li>
								<li class="right-list"><p class="views views-info"> views</p></li>
							</ul>
						</div>
					</div><?php endforeach; ?>

				
				<!--	<div class="col-md-4 resent-grid recommended-grid slider-top-grids">
						<div class="resent-grid-img recommended-grid-img">
							<a href="single.html"><img src="images/africanking.jpg" alt="" /></a>
							<div class="time">
								<p>4:04</p>
							</div>
							<div class="clck">
								<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
							</div>
						</div>
						<div class="resent-grid-info recommended-grid-info">
							<h3><a href="single.html" class="title title-info"></a></h3>
							<ul>
								<li><p class="author author-info"><a href="#" class="author">Prifix</a></p></li>
								<li class="right-list"><p class="views views-info"> views</p></li>
							</ul>
						</div>
					</div>-->
					<div class="clearfix"> </div>
				</div>
				<div class="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
							<h3>Moods</h3>
						</div>
						<script src="js/responsiveslides.min.js"></script>
						 <script>
							// You can also use "$(window).load(function() {"
							$(function () {
							  // Slideshow 4
							  $("#slider3").responsiveSlides({
								auto: true,
								pager: false,
								nav: true,
								speed: 500,
								namespace: "callbacks",
								before: function () {
								  $('.events').append("<li>before event fired.</li>");
								},
								after: function () {
								  $('.events').append("<li>after event fired.</li>");
								}
							  });
						
							});
						  </script>


					<!--Moods-->
					<div class="recommended-grids">
						<div class="col-md-3 resent-grid recommended-grid">
							
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/happy.jpeg" alt="" /></a>
								<div class="time small-time">
									<p>--</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Happy moments</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Various artist</a></p></li>
									<li class="right-list"><p class="views views-info"> listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/sad.jpeg" alt="" /></a>
								<div class="time small-time">
									<p>--</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Sad moments</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Various Artist</a></p></li>
									<li class="right-list"><p class="views views-info"> listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/alone.jpeg" alt="" /></a>
								<div class="time small-time">
									<p>--</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Feeling lonely</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Various Artist</a></p></li>
									<li class="right-list"><p class="views views-info"> listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/inlove.png" alt="" /></a>
								<div class="time small-time">
									<p>--</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Inlove</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Various Artist</a></p></li>
									<li class="right-list"><p class="views views-info"> listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>

					 .

				<!--Recmmended-->
				<div class="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
							<h3>Recommended</h3>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/r1.jpg" alt="" /></a>
								<div class="time small-time">
									<p>--</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Song name</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Artist name</a></p></li>
									<li class="right-list"><p class="views views-info"> Listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/r1.jpg" alt="" /></a>
								<div class="time small-time">
									<p>--</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Song name</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Artist name</a></p></li>
									<li class="right-list"><p class="views views-info"> Listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/r1.jpg" alt="" /></a>
								<div class="time small-time">
									<p>--</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Song name</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Artist name</a></p></li>
									<li class="right-list"><p class="views views-info"> Listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/r1.jpg" alt="" /></a>
								<div class="time small-time">
									<p>--</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Song name</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Artist name</a></p></li>
									<li class="right-list"><p class="views views-info"> Listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="recommended-info">
						<h3>Way Back</h3>
					</div>
					
					<!--Wayback-->
					<div class="recommended-grids">
						<div class="col-md-3 resent-grid recommended-grid">
							
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/hero_bg_4.jpg" alt="" /></a>
								<div class="time small-time">
									<p>4:07</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Muthu Wangu</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Mizophyll</a></p></li>
									<li class="right-list"><p class="views views-info"> listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/hero_bg_4.jpg" alt="" /></a>
								<div class="time small-time">
									<p>4:05</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Funanani</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Prifix</a></p></li>
									<li class="right-list"><p class="views views-info"> listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/hero_bg_4.jpg" alt="" /></a>
								<div class="time small-time">
									<p>6:09</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Toti</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">C-Jay</a></p></li>
									<li class="right-list"><p class="views views-info"> listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/hero_bg_4.jpg" alt="" /></a>
								<div class="time small-time">
									<p>4:26</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Halla Macfam</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Mac Fam</a></p></li>
									<li class="right-list"><p class="views views-info"> listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>

				<!--Favourites-->
				<div class="recommended">
					<div class="recommended-grids">
						<div class="recommended-info">
							<h3>Favorites</h3>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/r1.jpg" alt="" /></a>
								<div class="time small-time">
									<p>4:30</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Song Name</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Artist</a></p></li>
									<li class="right-list"><p class="views views-info"> Listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/r2.jpg" alt="" /></a>
								<div class="time small-time">
									<p>4:30</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Song Name</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Artist</a></p></li>
									<li class="right-list"><p class="views views-info"> Listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/r3.jpg" alt="" /></a>
								<div class="time small-time">
									<p>4:30</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Song Name</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Artist</a></p></li>
									<li class="right-list"><p class="views views-info"> Listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/r4.jpg" alt="" /></a>
								<div class="time small-time">
									<p>4:30</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Song Name</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Artist</a></p></li>
									<li class="right-list"><p class="views views-info"> Listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>

					<div class="recommended-info">
						<h3>Top chart</h3>
					</div>
					<div class="recommended-grids">
						<div class="col-md-3 resent-grid recommended-grid">
							<div class="resent-grid-img recommended-grid-img">
								<a href="single.html"><img src="images/top chart.jpg" alt=""></a>
								<div class="time small-time">
									<p>--</p>
								</div>
								<div class="clck small-clck">
									<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
								</div>
							</div>
							<div class="resent-grid-info recommended-grid-info video-info-grid">
								<h5><a href="single.html" class="title">Top 30</a></h5>
								<ul>
									<li><p class="author author-info"><a href="#" class="author">Various artist</a></p></li>
									<li class="right-list"><p class="views views-info">Listeners</p></li>
								</ul>
							</div>
						</div>
						<div class="recommended-grids">
							<div class="col-md-3 resent-grid recommended-grid">
								<div class="resent-grid-img recommended-grid-img">
									<a href="single.html"><img src="images/hip hop.jpg" alt=""></a>
									<div class="time small-time">
										<p>--</p>
									</div>
									<div class="clck small-clck">
										<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
									</div>
								</div>
								<div class="resent-grid-info recommended-grid-info video-info-grid">
									<h5><a href="single.html" class="title">Best Hip Hop</a></h5>
									<ul>
										<li><p class="author author-info"><a href="#" class="author">Various artist</a></p></li>
										<li class="right-list"><p class="views views-info">Listeners</p></li>
									</ul>
								</div>
							</div>
							<div class="recommended-grids">
								<div class="col-md-3 resent-grid recommended-grid">
									<div class="resent-grid-img recommended-grid-img">
										<a href="single.html"><img src="images/house.jpg" alt=""></a>
										<div class="time small-time">
											<p>--</p>
										</div>
										<div class="clck small-clck">
											<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
										</div>
									</div>
									<div class="resent-grid-info recommended-grid-info video-info-grid">
										<h5><a href="single.html" class="title">Best House</a></h5>
										<ul>
											<li><p class="author author-info"><a href="#" class="author">Various artist</a></p></li>
											<li class="right-list"><p class="views views-info">Listeners</p></li>
										</ul>
									</div>
								</div>
								<div class="recommended-grids">
									<div class="col-md-3 resent-grid recommended-grid">
										<div class="resent-grid-img recommended-grid-img">
											<a href="single.html"><img src="images/r6.jpg" alt=""></a>
											<div class="time small-time">
												<p>--</p>
											</div>
											<div class="clck small-clck">
												<span class="glyphicon glyphicon-time" aria-hidden="true"></span>
											</div>
										</div>
										<div class="resent-grid-info recommended-grid-info video-info-grid">
											<h5><a href="single.html" class="title">My mix</a></h5>
											<ul>
												<li><p class="author author-info"><a href="#" class="author">Various artist</a></p></li>
												<li class="right-list"><p class="views views-info">Listeners</p></li>
											</ul>
										</div>
									</div>
						<div class="clearfix"> </div>
					</div>
				</div>
			</div>
			<!-- footer -->
			<div class="footer">
				<div class="footer-grids">
					<div class="footer-top">
						<div class="footer-top-nav">
							<ul>
								<li><a href="about.html">About</a></li>
								<li><a href="#">Press</a></li>
								<li><a href="#">Copyright</a></li>
								<li><a href="#">Creators</a></li>
								<li><a href="#">Advertise</a></li>
								<li><a href="#">Developers</a></li>
							</ul>
						</div>
						<div class="footer-bottom-nav">
							<ul>
								<li><a href="#">Terms</a></li>
								<li><a href="#">Privacy</a></li>
								<li><a href="#small-dialog4" class="play-icon popup-with-zoom-anim">Send feedback</a></li>
								<li><a href="#">Policy & Safety </a></li>
								<li><a href="#">Try something new!</a></li>
							</ul>
						</div>
					</div>
				
		</div>
		<div class="clearfix"> </div>
	<div class="drop-menu">
		<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu4">
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Regular link</a></li>
		  <li role="presentation" class="disabled"><a role="menuitem" tabindex="-1" href="#">Disabled link</a></li>
		  <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another link</a></li>
		</ul>
	</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. 
  </body>
</html>