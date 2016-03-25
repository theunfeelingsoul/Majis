<?php 

// create my connection

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "majis";
// // made connection
// $conn = mysqli_connect($servername,$username,$password,$dbname);
// // check connection
// if (!$conn) {
// 	die(mysql_connection_error());
// }

// // create sql statement
// $sql = "SELECT * FROM sms";
// // queried the database
// $result = mysqli_query($conn,$sql) or die (mysqli_error());

// while ($row = mysqli_fetch_assoc($result)) {

// 	$data[] = array(
// 					'facility_name' 	=> $row['facility_name'], 
// 					'facility_number' 	=> $row['facility_number'], 
// 					'problems' 			=> $row['problems'], 
// 					'com_name' 			=> $row['com_name'], 
// 				);

// }






 ?>


<!DOCTYPE html>
<html>
<head>
	<title>majis</title>
	<!-- links css-->
	<?php include "includes/_csslinks.php"; ?>

</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="#">WMOS- Water Monitoring and Operation System</a>
	    </div>
	  </div><!-- /.container-fluid -->
	</nav>

	<!-- side bar -->
	<div class= "container-fluid">
		<div class="row">
			<?php include "includes/_sidebar.php"; ?>

			<div class="col-md-10">
				<h1 class="page-header"> Dash Board</h1>

				<div class="row">
					<div class="col-md-6">
						<table class="hover row-border compact" id="sms-table">

                                        <thead>
                                            <tr>
                                            	<tr>
                                            		<span> <b> Pending Task<b><br><br></span> 
                                            	</tr>
                                                <th>No.</th>
                                                <th>Facilities Name</th>
                                                <th>COWSO/WUA Name</th>
                                                <th>Problem</th>
                                                <th>Date overdue</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="success">
                                                <td>1</td>
                                                <td>XXXXX</td>
                                                <td>XXXXX</td>
                                                <td>The generator mulfanction at kiwalani</td>
                                                <td>10 Days</td>
                                            </tr>
                                            <tr class="info">
                                                <td>2</td>
                                                <td>XXXXX</td>
                                                <td>XXXXX</td>
                                                <td>XXXXX</td>
                                                <td>3 Days</td>
                                            </tr>
                                            <tr class="warning">
                                                <td>3</td>
                                                <td>XXXXX</td>
                                                <td>XXXXX</td>
                                                <td>XXXXX</td>
                                                <td>7 Days</td>
                                            </tr>
                                          
                                        </tbody>
                                    </table>
                                </div>

					
		 
       				<div class="col-md-6">

       					<!-- <table class="hover row-border compact" id="sms-table"> -->
       						<div class="col-lg-10">
                        <div class="chat-panel panel panel-success">
                            <div class="panel-heading">
                                <i class="icon-comments"></i>
                                Received SMS
                            </div>
                            <div class="panel-body">
                                <ol class="chat">
                                    <li class="left clearfix" >
                                        <!-- <span class="chat-img pull-left"> -->
                                            <!-- <img src="img/m.png" alt="User Avatar" class="img-circle"> -->
                                               <span class="glyphicon glyphicon-envelope"></span>
                                        <!-- </span> -->
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font "> [From] </strong>
                                                <small class="pull-right text-muted label label-danger">
                                                    <i class="icon-time"></i> 12 mins ago
                                                </small>
                                            </div>
                                             <!-- <br /> -->
                                            <p>
                                                <i>[title]]</i>
                                            </p>
                                            <p>
                                                [contents]
                                            </p>
                                        </div>
                                    </li>

                                    <li class="left clearfix">
                                      <!--   <span class="chat-img pull-left">
                                            <img src="img/b.png" alt="User Avatar" class="img-circle">
                                        </span> -->
                                          <span class="glyphicon glyphicon-envelope"></span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font "> Pump Problem </strong>
                                                <small class="pull-right text-muted label label-danger">
                                                    <i class="icon-time"></i> 12 mins ago
                                                </small>
                                            </div>
                                             <!-- <br /> -->
                                            <p>
                                                <i>Ratione itaque rhoncus</i>
                                            </p>
                                            <p>
                                                Ratione itaque rhoncus vulputate malesuada pretium vel excepturi 
                                            </p>
                                        </div>
                                    </li>

                                    <li class="left clearfix">
                                       <!--  <span class="chat-img pull-left">
                                            <img src="img/B.png" alt="User Avatar" class="img-circle">
                                        </span> -->
                                          <span class="glyphicon glyphicon-envelope"></span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font "> Pump Problem </strong>
                                                <small class="pull-right text-muted label label-danger">
                                                    <i class="icon-time"></i> 12 mins ago
                                                </small>
                                            </div>
                                             <!-- <br /> -->
                                            <p>
                                                <i>Ratione itaque rhoncus</i>
                                            </p>
                                            <p>
                                                Ratione itaque rhoncus vulputate malesuada pretium vel excepturi 
                                            </p>
                                        </div>
                                    </li>
                                </ol>
                            </div>

                            <div class="panel-footer">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success btn-sm btn-block" id="btn-chat">
                                            view all sms
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>























	<!-- javascript links -->

<?php include "includes/_jslinks.php"; ?>

</body>
</html>