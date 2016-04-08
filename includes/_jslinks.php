<!-- javascript links -->

	<!-- Jquery -->
	<script src="styles/js/jquery-1.11.3.min.js"></script>

	<!-- booostrap JS -->
	<script src="styles/bootstrap/js/bootstrap.min.js"></script> 

	<!-- Data Tables JS -->
	<script type="text/javascript" src="https://cdn.datatables.net/s/dt/dt-1.10.10/datatables.min.js"></script>

	<!-- The script below is to initialize the data table. -->
	<script type="text/javascript">
		$(document).ready( function () {
			// add the id of the table to make it a data table
		    $('#sms-table').DataTable(); 
		    $('#faci-table').DataTable(); 
		    $('#sms-table').DataTable();
		   
		} );
	</script>

	<script type="text/javascript">
		$('#sidebar > a').on('click', function (e) {
			e.preventDefault();

			if(!$(this).hasClass("active")){
				var lastActive = $(this).closest("#sidebar").children(".active");
				lastActive.removeClass("active");
				lastActive.next('div').collapse('hide');
				$(this).addClass("active");
				$(this).next('div').collapse('show');

			}

		});
	</script>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
	<script>
		$(function() {
			$( ".datepicker" ).datepicker();
		});
	</script>
