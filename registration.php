<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Movies - Register</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">  
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					<form role="form" method="POST" action="./components/Registration/Registration.php">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Choose username" autocomplete="off" name="username" type="text" autofocus="">
							</div>
                            <div class="form-group">
								<input class="form-control" placeholder="Email" autocomplete="off" name="email" type="text" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="pass" type="password" value="">
							</div>
                            <!-- <div class="form-group">
								<select class="form-control" placeholder="Gender" name="pass" type="password" value="">
                                    <option value="" disabled selected>Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
							</div> -->
							<!-- <div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="">I agree with terms and conditions
								</label>
							</div> -->
							<button type="submit" name="register">Register</button>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
