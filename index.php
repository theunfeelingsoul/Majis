<!DOCTYPE html>
<html>
<head>

	<?php 
		session_start();
		include "includes/_permissions.php"; 
	?>
	
	<title>majis</title>

	<!-- links css-->
	<?php include "includes/_csslinks.php"; ?>

</head>
<body>
	<?php include 'includes/_header.php'; ?>

	<!-- side bar -->
	<div class= "container-fluid">
		<div class="row" id="page">
			<?php include "includes/_sidebar.php"; ?>

			<div class="col-md-10">
				<h2 class="page-title"> Dash Board</h2>

				<div class="row">
					<div class="col-md-6">
						<div class="white-data-table">
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
                                    <td>WP78732</td>
                                    <td>Kitongo</td>
                                    <td>Kitongo Majavi</td>
                                    <td>The generator mulfanction at kiwalani</td>
                                    <td>10 Days</td>
                                </tr>
                                <tr class="info">
                                    <td>WP98675</td>
                                    <td>Nyasa</td>
                                    <td>Nyasa juu</td>
                                    <td>Pump Brakedown</td>
                                    <td>3 Days</td>
                                </tr>
                                   <tr class="success">
                                    <td>WP78732</td>
                                    <td>Kitongo</td>
                                    <td>Kitongo Majavi</td>
                                    <td>The generator mulfanction at kiwalani</td>
                                    <td>10 Days</td>
                                </tr>
                                <tr class="warning">
                                    <td>WP45673</td>
                                    <td>Imeli</td>
                                    <td>Imeli meli</td>
                                    <td>Engine overheat </td>
                                    <td>7 Days</td>
                                </tr>
                                <tr class="warning">
                                    <td>WP49373</td>
                                    <td>Kachoma</td>
                                    <td>kariakoo</td>
                                    <td>The generator mulfanction a Imeli</td>
                                    <td>7 Days</td>
                                </tr>
                                 <tr class="warning">
                                    <td>WP45673</td>
                                    <td>Pwani</td>
                                    <td>Msngolai</td>
                                    <td>Shaft seal leakage a Imeli</td>
                                    <td>7 Days</td>
                                </tr>
                            	<tr class="warning">
                                    <td>WP6793</td>
                                    <td>Chanika</td>
                                    <td>Msongola</td>
                                 <td>The generator mulfanction</td>
                                    <td>7 Days</td>
                                </tr>
	                            </tbody>
	                        </table>
	                    </div>
                    </div>
		 
       				<div class="col-md-6">
                        <div class="col-lg-10">
                            <div class="panel-heading">
                        <button type="button" class="btn btn-default btn-lg btn-block">
                                <span class="glyphicon glyphicon-share-alt"></span>
                        Received SMS   

                            </button>
                             </div>
                          <div class="panel-body">
                         
                                <span class="glyphicon glyphicon-envelope"></span>
                                    <div class="header">
                                        <p>
                                            <i>engine overheat</i>
                                        </p>
                                        <p>
                                        Pump engine to overheat due to less service
                                        </p>
                                    </div>
                          
                            
                            <!-- <li> -->
                                <span class="glyphicon glyphicon-envelope"></span>
                                    <div class="header">
                                        <p>
                                            <i>Weep hole leakage </i>
                                        </p>
                                        <p>
                                         contaminated coolant is the main cause of weep hole leakage.
                                        </p>
                                    </div>
                                       <!--  </li> -->
                                       
                                       <!--  <li> -->
                                            <span class="glyphicon glyphicon-envelope"></span>
                                                <div class="header">
                                                    <p>Pump Problem </p> 
                                                </div>
                                                <p>
                                                    <i>The shaft seal starts to leak</i>
                                                </p>
                                                <p>
                                                     The cooling system lose coolant but notsure of the percentage of damage 
                                                </p>
                              
                                      <!--   </li> -->

                                </div>
                                <div class="panel-footer">
                                            <button type="button" class="btn btn-default btn-lg btn-block">
                                             <span class="glyphicon glyphicon-expand"></span>    
                                             View all SMS</button>
                                  
	                                        </button>
	                                    </span>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/_footer.php"; ?>
    </div> <!--/.container-fluid-->






















	<!-- javascript links -->

<?php include "includes/_jslinks.php"; ?>

</body>
</html>