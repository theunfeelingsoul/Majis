<!-- Static navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<!-- <a class="navbar-brand" href="#">Project name</a> -->
			<div class="row logo-box">
			<div class="logo-box-title">
				WMOS
			</div>
			<div class="logo-box-name">
				Water Monitoring and Opration System
			</div>
		</div>
		</div>
		<div id="navbar" class="navbar-collapse collapse">

			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['username']; ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Logout</a></li>
						<li role="separator" class="divider"></li>
					</ul>
				</li>

				<li role="separator" class="divider"></li>
				 <!-- <li class="active"><a href="#">Menu</a></li> -->
				<li class="active visible-xs"><a href="index.php">Dashboard</a></li>
				<li class="dropdown visible-xs">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Online Monitoring <span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <li><a href="problems.php">Incoming problems</a></li>
	                <li><a href="broadcast.php">Broadcast</a></li>
	                <li><a href="facilities.php">Facilities</a></li>
	                <li><a href="gps.php">Facility Location</a></li>
	               
	              </ul>
	            </li>
	            <li class="dropdown visible-xs">
	              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports <span class="caret"></span></a>
	              <ul class="dropdown-menu">
	                <li><a href="report_sf.php">status of facilities</a></li>
	                <li><a href="report_cf.php">Problem remarks</a></li>
	                <li><a href="#">Number of problem reported</a></li>
	               
	              </ul>
	            </li>
                <li class="visible-xs"> <a href="users.php">Users</a></li>

			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>

