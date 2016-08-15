<?php include "includes/_sessions.php"; ?>
<?php
  include 'database.php';

  // id of the facility
  $id = $_GET['id'];

  // id of the problem from sms table
  $prob_id  = $_GET['prob_id'];

  // get the facility details with the facility_no provided
  $sql = "SELECT * FROM faci WHERE faci_num ='$id'";

  $result = mysqli_query($conn,$sql) or die(mysqli_error());

  while ($row = mysqli_fetch_assoc($result)) {  
    $data= array(
      'region'       => $row['region'],
      'lga'          => $row['lga'],
      'ward'         => $row['ward'],
      'faci_num'     => $row['faci_num'],
      'faci_name'    => $row['faci_name'],
      'faci_type'    => $row['faci_type'],
      'com_name'     => $row['com_name'],
      'com_contrib'  => $row['com_contrib'],
      'source'       => $row['source']
    );

  }


  // get problems from sms table
  // using the problem id given 
  // gotten from the facility status table
  function getProb($p_id,$conn){

    $prob_sql = "SELECT problems FROM faci_problems WHERE id = '$p_id'";
    $prob_result = mysqli_query($conn,$prob_sql)or die(mysqli_error());
    while ($prob_row = mysqli_fetch_assoc($prob_result)) {
      return $f_prob = $prob_row['problems'];
    }

  }

  // 


  // get data/problems from sms table
  $current_problem_sql = "SELECT problems FROM faci_problems WHERE id ='$prob_id'";
  $current_problem_result = mysqli_query($conn,$current_problem_sql) or die(mysqli_error());
  while ($current_problem_row = mysqli_fetch_assoc($current_problem_result)) {
    $current_problem_prob = $current_problem_row['problems'];
  }

  // get data from facility status, id comes from above
  $f_status_sql = "SELECT * FROM faci_status WHERE faci_num ='$id' ORDER BY id DESC";
  $f_status_result = mysqli_query($conn,$f_status_sql) or die(mysqli_error());

  // count rows
  $num_rows = mysqli_num_rows($f_status_result);

  // exit();
 
  if ($num_rows > 0) {
   while ($f_status_row = mysqli_fetch_assoc($f_status_result)) { 
      $f_status_data[] = array(
            'faci_num'            => $f_status_row['faci_num'] , 
            'date_of_update'  => $f_status_row['date_of_update'] , 
            'faci_con'           => $f_status_row['faci_con'] , 
            'comment'         => $f_status_row['comment'] , 
            'id'              => $f_status_row['id'] , 
            'problem'      => getProb($f_status_row['problem_id'],$conn) , 
      );
    }
  }else{
    $f_status_data = FALSE;
  }


  



  // insert into facility status
  if (isset($_POST['update_facility'])) {
      // get data from form input
      $faci_num               = $_GET['id'];
      $date_of_update         = $_POST['date_of_update'];
      $faci_con               = $_POST['faci_con'];
      $comment                = $_POST['comment'];
      $prob_id                = $_GET['prob_id'];



      // check if condition is working i.e 1
      // then update faci_problems table
      if ($faci_con == 1):
        $sql_update="UPDATE faci_problems SET status=1 WHERE id='$prob_id'";
        if (mysqli_query($conn, $sql_update)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
      elseif ($faci_con == 0):
        $sql_update="UPDATE faci_problems SET status=0 WHERE id='$prob_id'";
        if (mysqli_query($conn, $sql_update)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }
      endif;

      // exit();

      $sql = "INSERT INTO faci_status (
                          faci_num,
                          problem_id,
                          faci_con,
                          comment,
                          date_of_update)
              VALUES( '$faci_num',
                      '$prob_id',
                      '$faci_con',
                      '$comment',
                      '$date_of_update') ";

      if (mysqli_query($conn,$sql)) {
        // reload page with same get variables as before
        header("Location:edit_facility_status.php?id=$id&&prob_id=$prob_id");
        exit();
      }else{
        $status = 0;
        $error = "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
  }
 

  

  ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit: Facility Status</title>

  	<!-- links css-->
 <?php include "includes/_csslinks.php"; ?>
  <!-- ... -->

  <body>
	<?php include 'includes/_header.php'; ?>
	<!-- side bar -->
	<div class= "container-fluid">
		<div class="row" id="page">
			<?php include "includes/_sidebar.php"; ?>
      
			<div class="col-md-10 content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h1 class=""><?php echo $data['faci_name'] ?> Facility Status</h1><hr/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <!-- <span class="h3">Facility Details</span> -->
              <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="faci_detail_heading">
                    <h4 class="panel-title">
                      <a role="button" data-toggle="collapse" data-parent="#accordion" href="#faci_detail" aria-expanded="true" aria-controls="faci_detail">
                        <?php echo $data['faci_name'] ?> details
                      </a>
                    </h4>
                  </div>
                  <div id="faci_detail" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="faci_detail_heading">
                    <div class="panel-body">
                      <div class="table-responsive">
                       <table class="table-condensed table table-striped">
                        <thead>
                          <th></th>
                          <th></th>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Region</td>
                            <td><?php echo $data['region'] ?></td>
                          </tr>
                          <tr>  
                            <td>LGA</td>
                            <td><?php echo $data['lga'] ?></td>
                          </tr>
                          <tr>
                            <td>Ward</td>
                            <td><?php echo $data['ward'] ?></td>
                          </tr>
                          <tr>
                            <td>Facility no.</td>
                            <td><?php echo $data['faci_num'] ?></td>
                          </tr>
                          <tr>
                            <td>Facility name</td>
                            <td><?php echo $data['faci_name'] ?></td>
                          </tr>
                          <tr>
                            <td>Facility type</td>
                            <td><?php echo $data['faci_type'] ?></td>
                          </tr>
                          <tr>
                            <td>Community name</td>
                            <td><?php echo $data['com_name'] ?></td>
                          </tr>
                          <tr>
                            <td>Community contribution</td>
                            <td><?php echo $data['com_contrib'] ?></td>
                          </tr>
                          <tr>
                            <td>Source</td>
                            <td><?php echo $data['source'] ?></td>
                          </tr>
                        </tbody>
                      </table>
                    </div><!--/.table-responsive-->
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#faci_update_form" aria-expanded="false" aria-controls="faci_update_form">
                        Status Update Form
                      </a>
                    </h4>
                  </div>
                  <div id="faci_update_form" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <form id="update-facility-status-form" class="" method="POST" action="">

                          <!-- hidden input to collect the date -->
                          <input type="hidden" name="date_of_update" value="<?php echo time();  ?>" />

                          <p>Problem : <?php echo $current_problem_prob; ?></p>
                          <?php if ( isset($status) && $status =="success" ): ?>

                              <div class="alert alert-success" role="alert">
                              Sucess. View the facility <a href="facilities.php">here</a>
                              </div>

                          <?php endif; ?>

                          <?php if ( isset($status) && $status =="fail" ): ?>
                              <div class="alert alert-danger" role="alert">
                              Error. Something went wrong. 
                              PLease contact ur administrator. <br>
                              <?php echo $error ?>
                            </div>
                          <?php endif; ?> 

                            <div class="form-group">
                              <label class= " control-label">Condition:</label>
                              <!-- <div class="col-sm-6"> -->
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="faci_con" id="optionsRadios1" value="1" checked>
                                      Working
                                    </label>
                                  </div>  
                                  <div class="radio">
                                    <label>
                                      <input type="radio" name="faci_con" id="optionsRadios2" value="0">
                                      Not Working
                                    </label>
                                  </div>
                              <!-- </div> -->
                            </div>
                            <div class="form-group">
                              <label class= "control-label" >comment:</label>
                              <!-- <div class="col-sm-6"> -->
                                  <textarea name="comment" rows="5" cols="6" class="form-control" required ></textarea>
                              <!-- </div> -->
                            </div>
                            
                           <div class="form-group">
                              <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="update_facility" class="btn btn-primary">Update</button>
                              </div>
                          </div>
                         
                        </form>
                    </div>
                  </div>
                </div>
               
              </div>
            </div> <!--.col-md-5-->

           

            <div class="col-md-7">
              <div class="white-data-table">
                <h4>History of problems</h4><hr/>
                <div class="table-responsive">
                <table  class="table table-condensed table-striped">
                   <thead>
                      <th>Date</th>
                      <th>Problem</th>
                      <th>Condition</th>
                      <th>Comment</th>
                    </thead>
                </table>
                </div><!--table-responsive-->
                <div class="history-problem-table">
                <div class="table-responsive">
                  <table class="table table-condensed table-striped">
                   <!--  <thead>
                      <th>Date</th>
                      <th>Problem</th>
                      <th>Condition</th>
                      <th>Comment</th>
                    </thead> -->
                    <tbody>
                   
                    <?php if ($f_status_data):
                          foreach ($f_status_data as $key => $f_status): ?>
                          <tr>
                          <td class="col-md-2"><?php echo date('d-m-Y',$f_status['date_of_update'])  ?></td>
                          <td class="col-md-2"><?php echo $f_status['problem']  ?></td>
                          <td class="col-md-1"><?php  echo $f_status['faci_con'] == 1 ? '<span class="glyphicon glyphicon-ok-circle"></span>': '<span class="glyphicon glyphicon-remove-circle"></span>'; ?></td>
                          <td class="col-md-3"><?php echo $f_status['comment']  ?></td>
                          </tr>
                    <?php endforeach;
                          endif; ?>

                    </tbody>
                  </table>
                </div><!--table-responsive-->
                </div>
              </div>
            </div>
          </div>
        </div> <!-- .continer-fluid -->
			</div> <!--.col 8-->
		</div> <!--.row -->
	</div>
   
	<!-- javascript links -->
<?php include "includes/_jslinks.php"; ?>

<script src="styles/js/waterpoints.js"></script>

</body>
</html>