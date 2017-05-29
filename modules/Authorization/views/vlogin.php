

<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body>
		
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">PERTAMINA</a>
			</div>
	
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					
				</ul>
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Link</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

		<div class="container">
		
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			
		</div>

		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				
				<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Panel Login</h3>
				</div>
				<div class="panel-body">
					<form action="<?php echo base_url('Authorization/login')?>" method="POST" class="form-horizontal" role="form">
						
						<div id="hasil">
						<?php
						if($this->session->flashdata('login')){
						?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Perhatian!</strong> <?php echo $this->session->flashdata('login'); ?>
						</div>
						<?php } ?>
						</div>

							<div class="form-group">
								<div class="col-sm-12">
									<input type="text" name="username"  placeholder="username" class="form-control">
								</div>
							</div>		
							
							<div class="form-group">
								<div class="col-sm-12">
									<input type="password" name="password"  placeholder="password" class="form-control">
								</div>
							</div>	
					
							<div class="form-group">
								<div class="col-sm-6">
									
								</div>
								<div class="col-sm-6">
									<button type="submit"  class="btn btn-primary btn-block">Login</button>
								</div>
							</div>
					</form>
				</div>
			</div>


		</div>

		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			
		</div>

			
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		
	</body>
</html>