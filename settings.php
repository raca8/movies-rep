<?php
    session_start();
    if(!isset($_SESSION['username'])){
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
				<div class="profile-usertitle-name"><?php echo $_SESSION['username'];?></div>
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
			<li><a href="movies.php"><em class="fa fa-calendar">&nbsp;</em> Movies</a></li>
			<li><a href="mymovies.php"><em class="fa fa-bar-chart">&nbsp;</em> My Movies</a></li>
			<li class="active"><a href="settings.php"><em class="fa fa-toggle-off">&nbsp;</em> Settings</a></li>
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
	</div><!--/.sidebar-->
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Settings</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Settings</h1>
			</div>
		</div>


        <div class="panel panel-default">
					<div class="panel-heading"><span class="glyphicon glyphicon-lock"></span> Change Password</div>
					<div class="panel-body">
						<form class="form-horizontal" action="./components/ChangePassword/ChangePassword.php" method="POST">
							<fieldset>
								<!-- Name input-->
								<div class="form-group">								
									<div class="col-md-6">
									<input id="name" name="newpassword" type="password" placeholder="New password" class="form-control">
									</div>
								</div>
							
								<!-- Email input-->
								<div class="form-group">									
									<div class="col-md-6">
										<input id="email" name="confirmnewpassword" type="password" placeholder="Confirm password" class="form-control">
									</div>
								</div>
								
								<!-- Form actions -->
								<div class="form-group">
									<div class="col-md-12">
										<button type="submit" class="btn btn-default btn-md" name="submitnewpassword">Submit</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>



        <div class="col-sm-12">
            <p class="back-link">COPYRIGHT STRAHINJA BOMESTAR</p>
        </div>
	</div>	<!--/.main-->
	
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
