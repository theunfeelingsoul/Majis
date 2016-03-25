<html>
<head>
	<title>majis</title>
  <?php include "includes/_csslinks.php"; ?>
</head>
<body>
 <form class="form-horizontal">
    <div class="form-group">
      <label class= "col-sm-2" control-label>Facility name: </label>
        <div class="col-sm-10">
          <select class="form-control">
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
          </select>
            <!-- <input type="text" class="form-control" name="facility_name" placeholder="facility name"> -->
        </div>
    </div>
    <div class="form-group">
      <label class= "col-sm-2" control-label>Facility number:</label>
      <div class="col-sm-10">
          <select class="form-control">
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
          </select>
       <!-- <input type="text" class="form-control" name="facility_number" placeholder="facility number"> -->
      </div>
    </div>
    <div class="form-group">
      <label class= "col-sm-2" control-label>COWSO/WUA name:</label>
      <div class="col-sm-10">
          <select class="form-control">
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
            <option>xxx</option>
          </select>
        <!-- <input type="text" class="form-control" name="cowso_name" placeholder="COWSO/WUA name"> -->
      </div>
    </div>
    <div class="form-group">
      <label class= "col-sm-2" control-label> Status:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="status" placeholder="Status">
      </div>
    </div>
    <div class="form-group">
      <label class= "col-sm-2">Comment:</label>
      <div class="col-sm-10">
        <textarea class="form-control" name="comment" rows="4"></textarea></br>
    </div>
     <div class="form-group">
        <div class='input-group date' id='datetimepicker1'>
          <input type='text' class="form-control" />
            <span class="input-group-addon">
              <span class="glyphicon glyphicon-calendar"></span>
            </span>
        </div>
      </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
   
  </form>

<!-- copy this from gpsfile and add js for datetime -->
  <!-- javascript links -->

<?php include "includes/_jslinks.php"; ?>
<script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
<script src="styles/js/waterpoints.js"></script>


</body>
</html>
