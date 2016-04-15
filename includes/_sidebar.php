<div class="col-md-2 sidebar" id="side-bar"> 
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#x" aria-expanded="false" aria-controls="x">
					<span class="glyphicon glyphicon-th-large"> </span>&nbsp;&nbsp;<a href="index.php">Dashboard</a>
				</a>
				</h4>
			</div>
			<div id="x" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<!-- dashboard lik has no data. Leave it like that -->
				<div class="panel-body side-bar-body"> </div>
			</div>	
		</div> <!--/.panel .panel-default-->
		
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
						<span class="glyphicon glyphicon-check"></span>&nbsp;&nbsp;Online Monitoring 
					</a>
				</h4>
			</div>
			<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body side-bar-body">
					<ul>
						<a href="problems.php">
							<li>Incoming problems</li>
						</a>
						<a href="facilities.php">
							<li>Facilities</li>
						</a>
						<a href="gps.php">
							<li>GPS Locations</li>
						</a>
					</ul>
				</div>
			</div>
		</div><!--/.panel .panel-default-->

		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingTwo">
				<h4 class="panel-title">
					<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<span class="glyphicon glyphicon-tasks"></span>&nbsp;&nbsp;Reports
					</a>
				</h4>
			</div>
			<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
				<div class="panel-body side-bar-body">
					<ul>
						<a href="report_sf.php">
							<li>status of facilities</li>
						</a>
						<a href="">
							<li>Comments of facilities</li>
						</a>
						<a href="">
							<li>Number of problem reported</li>
						</a>
						<a href="">
							<li>Type of problem reported</li>
						</a>
						<a href="">
							<li>Community Contribution</li>
						</a>
					</ul>
				</div>
			</div>
		</div> <!--/.panel .panel-default-->
		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="headingOne">
				<h4 class="panel-title">
					<a role="button" data-toggle="collapse" data-parent="#accordion" href="#x" aria-expanded="false" aria-controls="x">
					<span class="glyphicon glyphicon-th-large"> </span>&nbsp;&nbsp;<a href="users.php">Users</a>
				</a>
				</h4>
			</div>
			<div id="x" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
				<!-- dashboard lik has no data. Leave it like that -->
				<div class="panel-body side-bar-body"> </div>
			</div>	
		</div> <!--/.panel .panel-default-->

	</div> <!--/.accordion-->
</div> <!-- .col-md-2.sidebar -->
