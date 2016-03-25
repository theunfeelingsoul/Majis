<form id="formname" name="formname" method="post" action="submitform.asp" >
		<table width="50%" border="0" cellspacing="0" cellpadding="5">
			<tr>
				<td width="41%" align="right" valign="middle">Category1 :</td>
				<td width="59%" align="left" valign="middle">
					<select name="category1" id="category1">
						<option value="">Select Category1</option>
						<option value="home_ware">Home Ware</option>
						<option value="education">Education</option>
						<option value="books">Books</option>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right" valign="middle">Category2 :</td>
				<td align="left" valign="middle">
					<select disabled="disabled" class="subcat" id="category2" name="category2">
						<option value>Select Category2</option>
						<!-- Home Ware -->
						<option rel="home_ware" value="air-conditioners_coolers">Air-Conditioners/Coolers</option>
                        <option rel="home_ware" value="audio-video">Audio/Video</option>
						<option rel="home_ware" value="beddings">Beddings</option>
						<option rel="home_ware" value="camera">Camera</option>
						<option rel="home_ware" value="cell-phones">Cell Phones</option>
						<!-- Education -->
						<option rel="Education" value="Colleges">Colleges</option>
						<option rel="Education" value="Institutes">Institutes</option>
						<option rel="Education" value="Schools">Schools</option>
						<option rel="Education" value="Tuitions">Tuitions</option>
						<option rel="Education" value="Universities">Universities</option>
						<!-- Books -->
						<option rel="Books" value="College Books">College Books</option>
						<option rel="Books" value="Engineering">Engineering</option>
						<option rel="Books" value="Magazines">Magazines</option>
						<option rel="Books" value="Medicine">Medicine</option>
						<option rel="Books" value="References">References</option>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right" valign="middle">Category3 :</td>
				<td align="left" valign="middle">
					<select disabled="disabled" class="subcat" id="category3" name="category3">
						<option value>Select Category3</option>
						<!-- Home Ware -->
						<option rel="home_ware" value="foo1">category3 home ware 1</option>
                        <option rel="home_ware" value="foo2">category3 home ware 2</option>
						<!-- Education -->
						<option rel="Education" value="foo3">category3 Education 1</option>
						<option rel="Education" value="foo4">category3 Education 2</option>
						
						<!-- Books -->
						<option rel="Books" value="foo5">category3 Books 1</option>
						<option rel="Books" value="foo6">category3 Books 2</option>

					</select>
				</td>
			</tr>
		</table>
	</form>

	<select id="names">
		<option>sarah</option>
		<option>vic</option>
		<option>simon</option>
		<option>juliet</option>
	</select>

	<select id="city" disabled="true">
		<option>select city</option>
	</select>
	<select id="food" disabled="true">
		<option>select food</option>
		
	</select>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript">
		$(function(){
    
		    var $cat = $("#category1"),
		        $subcat = $(".subcat");
		    
		    $cat.on("change",function(){
		        var _rel = $(this).val();
		        $subcat.find("option").attr("style","");
		        $subcat.val("");
		        if(!_rel) return $subcat.prop("disabled",true);
		        $subcat.find("[rel="+_rel+"]").show();
		        $subcat.prop("disabled",false);
		    });
		    
		});

		// on change get the value of the select option
		var $names = $("#names");
		var $city = $("#city");

		$names.on("change",function(){
			// clear the next two selects
			$('#city').empty();
			$('#food').empty();
			// disable the last select
			$('#food').prop("disabled",true);
			// eneable the city select
			$('#city').prop("disabled",false);
			
			//get the chosen value
			var n = $names.val()
	        // send the value to query the database
			$.post( "getcity.php?n="+n, function( data ) {
				// set the first select option as select food
				$('#food').append($("<option></option>").attr("value","0").text("select food"));
				//then populate the select 
				var selectValues = data;
				// use Jason.parse() to convert the data to an object
				// because the $.each function works on objects
				$.each(JSON.parse(selectValues), function(key, value) {   
				     $('#city')
				         .append($("<option></option>")
				         // you can write it as
				         // .attr("value",key) 
				         // if you want the value attribute to be numbered 
				         .attr("value",value) 
				         .text(value)); 
				});
			}); // end post
	    });

	    $city.on("change",function(){
    		// clear the food select
			$('#food').empty();
			// enable the food select
			$('#food').prop("disabled",false);

			//get the chosen value
			var c = $city.val()
			console.log(c);

	        // send the value to query the database
			$.post( "getcity.php?c="+c, function( data ) {
				//populate the select 
				var selectValues = data;
				console.log(data);
				// use Jason.parse() to convert the data to an object
				// because the $.each function works on objects
				$('#food').append($("<option></option>").attr("value","0").text("select food")); 
				$.each(JSON.parse(selectValues), function(key, value) {   
					$('#food')
						.append($("<option></option>")
						// you can write it as
						// .attr("value",key) 
						// if you want the value attribute to be numbered 
						.attr("value",key)
						.text(value)); 
				});
			}); // end post
	    });

		// var selectValues = { "1": "test 1", "2": "test 2" };
		// $.each(selectValues, function(key, value) {   
		//      $('#mySelect')
		//          .append($("<option></option>")
		//          .attr("value",key)
		//          .text(value)); 
		// });
	</script>