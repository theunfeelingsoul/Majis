<?php  //include "includes/_sessions.php"; ?>
<nav class="navbar navbar-default navbar-fixed-top" id="nav-boss">
	<div class="container-fluid">
		<div class="col-md-2 row logo-box">
			<div class="logo-box-title">
				WMOS
			</div>
			<div class="logo-box-name">
				Water Monitoring and Opration System
			</div>
		</div>
		<div class="col-md-5 nav navbar-nav navbar-left">
			<div id="title-head"></div>
		</div>

	    <ul class="nav navbar-nav navbar-right">
	    	<!-- <span class="glyphicon glyphicon-user"></span> -->
	    	<li>
	    		<a href="">
		    		<!-- <span class="glyphicon glyphicon-envelope"></span>
		    		<span class="badge">1</span> -->
	    		</a>
	    	</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
					<!-- <span class="glyphicon glyphicon-user"></span>  -->
					<?php echo $_SESSION['username']; ?>
					<span class="caret"></span>
				</a>
				
				<ul class="dropdown-menu">
					<li>
						<a href="#">
							<!-- <span class="glyphicon glyphicon-user"></span> -->
							&nbsp;&nbsp;Profile
						</a>
					</li>
					<li role="separator" class="divider"></li>
					<li>
						<a href="logout.php">
							<!-- <span class="glyphicon glyphicon-log-out"></span> -->
							&nbsp;&nbsp;Log out
						</a>
					</li>
				</ul>
			</li>

		</ul>


	    
	  </div><!-- /.container-fluid -->
</nav>