<?php
session_start();
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Movies</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	<link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<?php
	require("../movies/components/Credentials/credentials.php");
	require("../movies/components/CheckPrivileges/checkPrivileges.php");
	echo $isAdmin;

	?>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Movies </span></a>
				<?php
				echo "" . ($isAdmin == 'Admin' ? "<ul class='nav navbar-top-links navbar-right'>
			<li class='dropdown'><a class='dropdown-toggle count-info' data-toggle='dropdown' href='#'>
					<em class='fa fa-bell'></em><span class='label label-info count'></span>
				</a>
				<ul class='dropdown-menu dropdown-alerts'>
					<li>
						<div class='notification'>

						</div>
					</li>
				</ul>
			</li>
		</ul>" : "") . ""; ?>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $_SESSION['username']; ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Homepage</a></li>
			<li class="active"><a href="movies.php"><em class="fa fa-calendar">&nbsp;</em> Movies</a></li>
			<?php
			echo "" . ($isAdmin == 'Admin' ? "<li>
			<a href='movieRequests.php'><em class='fa fa-bar-chart'>&nbsp;</em>Movie Requests</a></li>"
				: "<li><a href='myMovies.php'><em class='fa fa-bar-chart'>&nbsp;</em>My Movies</a></li>") . "";

			?>
			<li><a href="settings.php"><em class="fa fa-toggle-off">&nbsp;</em> Settings</a></li>
			<li><a href="contact.php"><em class="fa fa-clone"></em> Contact</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
					<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
							<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
						</a></li>
					<li><a class="" href="#">
							<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
						</a></li>
					<li><a class="" href="#">
							<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
						</a></li>
				</ul>
			</li>
			<li><a href="login.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
						<em class="fa fa-home"></em>
					</a></li>
				<li class="active">Movies</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Movies</h1>
			</div>
		</div>


		<!-- foreach ($result->data->movies[0]->torrents as $aryKey => $aryValue) {
		foreach ($aryValue as $key => $value) {
		if($key == "url"){
		$urlTorent = $value;
		echo $urlTorent;
		}
		}
		} -->

		<?php
		$url = 'https://yts.mx/api/v2/list_movies.json?limit=15';
		$result = file_get_contents($url);
		$result = json_decode($result);

		// po id 

		// $url1 = 'https://yts.mx/api/v2/movie_details.json?movie_id=28644';
		// $result1 = file_get_contents($url1);
		// $result1 = json_decode($result1);
		// foreach ($result1->data->movie->torrents[0] as $key => $value) {
		// 	// echo gettype($value), "\n";
		// 	if ($key == "url") {
		// 		echo $value;
		// 		$cao = $value;
		// 	}
		// }

		// po ID filma


		// $url1 = 'https://yts.mx/api/v2/list_movies.json?limit=1';
		// $result1 = file_get_contents($url1);
		// $result1 = json_decode($result1);
		// " . ($id == $movieID ? "<button class='download720Button'>
		// 				<a href='$id' target='_blank'>Download 720p</a></button>
		// 				<button class='download720Button'>Download 1080p</button>" : "") . "
		require("../movies/components/Credentials/credentials.php");
		require('../movies/components/Database/Database.php');
		if (isset($_POST['requestMovie'])) {

			$title2 = $_POST['title'];
			$summary = $_POST['summary'];
			$year = $_POST['year'];
			$rating = $_POST['rating'];
			$runtime = $_POST['runtime'];
			$language = $_POST['language'];
			$imagePath = $_POST['imagePath'];

			$x = mysqli_query($conn, "INSERT INTO movies(name, year, rating, runtime, language, imagePath, isRequested, user_fk) 
                    VALUES('" . $title2 . "', '" . $year . "', '" . $rating . "', '" . $runtime . "', '" . $language . "', '" . $imagePath . "', 1, '" . $idGlobal . "')");
			if ($x) {
				echo '';
			} else {
				$jbg = "ERROR";
			}
		}
		// upit za sutra
		// SELECT movies.year, movies.name, movies.rating, users.username FROM movies INNER JOIN users ON movies.user_fk = users.id;



		foreach ($result->data->movies as $aryKey => $aryValue) {

			foreach ($aryValue as $key => $value) {
				if ($key == "title") {
					$title = $value;
				}
				if ($key == "summary") {
					$summary = $value;
				}
				if ($key == "description") {
					$title = $value;
				}
				if ($key == "year") {
					$year = $value;
				}
				if ($key == "rating") {
					$rating = $value;
				}
				if ($key == "runtime") {
					$runtime = $value;
				}
				if ($key == "language") {
					$language = $value;
				}

				if ($key == "medium_cover_image") {
					echo

					"<form method='POST'><div class='card'>
					<h5 style='font-size: 30px;'>$title<h5>
					<div><p style='float: left'><img src=$value style></p>
					<b>summary: <br><br></b>
					<p>$summary</p><br>
					<b>Year: </b>$year<br><br>
					<b>Rating: </b> $rating <br><br>
					<b>Runtime: </b>$runtime min.<br><br>
					<b>Language: </b>$language<br><br>
					</img>
					
					" . ($isAdmin == 'Admin' ? ""
						: "<button type='submit' name='requestMovie' class='button2'>Request download</button>") . "
					<input type='text' name='title' value='$title' hidden>
					<input type='text' name='imagePath' value='$value' hidden>
					<input type='text' name='summary' value='$summary' hidden>
					<input type='text' name='year' value='$year' hidden>
					<input type='text' name='runtime' value='$runtime' hidden>
					<input type='text' name='rating' value='$rating' hidden>
					<input type='text' name='language' value='$language' hidden>
					</div>
					</div></form>
					";
				}
			}
		}
		?>

		<div class="col-sm-12">
			<p class="back-link">COPYRIGHT STRAHINJA BOMESTAR</p>
		</div>
	</div>
	<!--/.main-->


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>

</body>

</html>