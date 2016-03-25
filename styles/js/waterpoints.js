// on change get the value of the select option
		var $region = $("#region");
		var $lga = $("#lga");
		var $ward = $("#ward");

		$( "#admin_divsion" ).submit(function( event ) {
			console.log("form submitted");
			console.log($region.val());
			console.log($lga.val());
			console.log($ward.val());

			var w = $ward.val();
			event.preventDefault();

			// get data from database
			$.post( "admin_divsion_ajax.php?w="+w, function( data ) {

				// get the returned data
				// var str = data;
				// console.log(data);

				// // quote text data. If the array was plain number data, we don't even need this step.
				// var quoted = str.replace(/([a-zA-Z]+)/g,'"$1"');

				// // rewrite to JSON form for a nested array
				// var jsonStr = "[[" + quoted.replace(/#/g,'],[') + "]]";

				// // done, just tell the JSON parser to do what it needs to do.
				// var locations = JSON.parse(jsonStr);

				var i;
				// var string = "A,2,5# B,4,4# C,4,4";
				var arr1 = data.split("#");
				var arr2 = [];
				for (i = 0; i < arr1.length; i++) {
				        arr2[i]=arr1[i].split(",");
				} 

				var locations = arr2;

				console.log(locations)

			    var map = new google.maps.Map(document.getElementById('map'), {
			      zoom: 6,
			      center: new google.maps.LatLng(-7.443954, 36.719101),
			      mapTypeId: google.maps.MapTypeId.ROADMAP
			    });

			    var infowindow = new google.maps.InfoWindow();

			    var marker, i;

			    for (i = 0; i < locations.length; i++) {  
			    
			      marker = new google.maps.Marker({

			        position: new google.maps.LatLng(locations[i][2], locations[i][1]),
			        map: map
			      });

			      google.maps.event.addListener(marker, 'click', (function(marker, i) {
			        return function() {
			          infowindow.setContent(locations[i][0]);
			          infowindow.open(map, marker);
			        }
			      })(marker, i));
			    }


			    }); // end post
		
		}); // end submit function  and maps
		
		// STEP 1 : CHOOSE REGION
		// get the list of LGA's 
		// dpendant on the REGION  chosen
		$region.on("change",function(){
			// clear the next two selects tags
			$('#lga').empty();
			$('#ward').empty();
			// disable the #ward select
			$('#ward').prop("disabled",true);
			// eneable the #lga select
			$('#lga').prop("disabled",false);
			
			//get the value of #region select chosen
			var r = $region.val();
	        // send the value to query the database
	        // use ajax post
			$.post( "admin_divsion_ajax.php?r="+r, function( data ) {
				// set the first select option for #lga as select LGA
				// set the first select option for #ward as select Ward
				$('#lga').append($("<option></option>").attr("value","0").text("select LGA"));
				$('#ward').append($("<option></option>").attr("value","0").text("select Ward"));
				//then populate the #lga select 
				var selectValues = data;
				// use Jason.parse() to convert the data to an object
				// because the $.each function works on objects
				$.each(JSON.parse(selectValues), function(key, value) {   
				     $('#lga')
				         .append($("<option></option>")
				         // you can write it as
				         // .attr("value",key) 
				         // if you want the value attribute to be numbered 
				         .attr("value",value) 
				         .text(value)); 
				});
			}); // end post
	    });

		// STEP 2:CHOOSE LGA
	    $lga.on("change",function(){
    		// clear the #ward select
			$('#ward').empty();
			// enable the #ward select
			$('#ward').prop("disabled",false);

			//get the chosen value for the #lga 
			var l = $lga.val()
			console.log(l);

	        // send the value to query the database
			$.post( "admin_divsion_ajax.php?l="+l, function( data ) {
				//populate the select 
				var selectValues = data;
				console.log(data);
				// set the first option for asthetic. to say what the select if for
				$('#ward').append($("<option></option>").attr("value","0").text("select Ward")); 
				// use Jason.parse() to convert the data to an object
				// because the $.each function works on objects
				
				$.each(JSON.parse(selectValues), function(key, value) {   
					$('#ward')
						.append($("<option></option>")
						// you can write it as
						// .attr("value",key) 
						// if you want the value attribute to be numbered 
						.attr("value",value)
						.text(value)); 
				});
			}); // end post
	    });