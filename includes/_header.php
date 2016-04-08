<?php  //include "includes/_sessions.php"; ?>
<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">WMOS- Water Monitoring and Operation System</a>
	    </div>


	    <ul class="nav navbar-nav navbar-right">
	    	<!-- <span class="glyphicon glyphicon-user"></span> -->
	    	<li>
	    		<a href="">
		    		<span class="badge">1</span>
		    		<span class="glyphicon glyphicon-envelope"></span>
	    		</a>
	    	</li>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span>
				</a>
				
				<ul class="dropdown-menu">
					<li><a href="#"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;<?php echo $_SESSION['username'].' - '.$_SESSION['role'] ?></a></li>
					<li role="separator" class="divider"></li>
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Log out</a></li>
				</ul>
			</li>

		</ul>


	    
	  </div><!-- /.container-fluid -->
</nav>