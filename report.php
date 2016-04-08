<?php include "includes/_sessions.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit facility Status</title>

  	<!-- links css-->
 <?php include "includes/_csslinks.php"; ?>
  <!-- ... -->

  <body>
	<?php include 'includes/_header.php'; ?>
	<!-- side bar -->
	<div class= "container-fluid">
		<div class="row">
			<?php include "includes/_sidebar.php"; ?>
      
			<div class="col-md-10">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <h1 class="">Report</h1><hr/>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
              <form class="form-inline">
                <div class="form-group">
                  <label class="sr-only" for="exampleInputEmail3">Email address</label>
                  <select class="form-control">
                    <option>Region</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputPassword3">Password</label>
                  <select class="form-control">
                    <option>LGA</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="form-group">
                  <label class="sr-only" for="exampleInputPassword3">Password</label>
                  <select class="form-control">
                    <option>WARD</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                 <div class="form-group">
                  <label class="sr-only" for="exampleInputPassword3">Password</label>
                  <select class="form-control">
                    <option>Facility N</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Pay
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Not pay
                  </label>
                </div>
                
                <button type="submit" class="btn btn-default">View</button>
              </form>
            </div> <!--.col-md-5-->

           

          
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