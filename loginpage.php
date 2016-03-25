<?php  ?><html>
  <head>
    <title>majis</title>
    <!-- links css-->
  <?php include "includes/_csslinks.php"; ?>
  </head>
    <body>
      <div>
        <form>
          
          <div class="container col-md-8">
            <div style="margin-top:20px;" class="row-fluid">
               <h1 class="page-header"> WMOS- Water Monitoring and Operation System</h1>
            <span><img src="image/favicon.jpg" width="100" height="100"></span>
           <div class="offset4 span6">
            <div class="container col-md-2">
            <div class="form-group">
              <label for="username">user name</label>
              <input type="username" class="form-control" id="exampleInputEmail1" placeholder="username">
            </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>

              <select name="utype" class="box">
                <option >&nbsp;&nbsp;--- Select User Type--- &nbsp;</option>
                <option value="admin">&nbsp;&nbsp; Administrator &nbsp;</option>
                <option value="customer">&nbsp;&nbsp;Engineer &nbsp;</option>
                <option value="employee">&nbsp;&nbsp;user &nbsp;</option>
              </select>
            <!-- <div class="form-group">
              <label for="usertype">usertype/label>
              <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div> -->
            <!-- <button type="submit" class="btn btn-default">Submit</button> -->
            <input name="btnLogin" type="submit" id="btnLogin" value=" Login here"> 
        
              </div>
           </div>
          </div> 
        </div>
       </form>
   
    </body>
</html>
