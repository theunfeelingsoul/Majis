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
		    $('#sms-table-dash').DataTable();
		   
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



<!-- keeps the sidebar respective menu item open ehn page refreshes / changes -->
<script type="text/javascript">
	// get the url
	var urlstring = window.location.href;
	// save the pages in an array
	var pages = ['problems', 'facilities', 'gps', 'report_sf','report_cf'];
	// get the length of array
	var arrayLength = pages.length;
	// loop over the pages array
	for (var i = 0; i < arrayLength; i++) {
		// check if page is in url
		// the following function returns a true or false rersponse
		var st = urlstring.indexOf(pages[i]) > -1;
		if (st == true) {
			// chnage the or add the respective classes
			if (pages[i]=='problems' || pages[i]=='facilities' || pages[i]=='gps' ) {
				$("#headingOne .collapsed").attr("aria-expanded","true");

				$('#collapseOne').addClass('in');
			}
			if (pages[i]=='report_sf' || pages[i]=='report_cf' ) {
				$("#headingTwo .collapsed").attr("aria-expanded","true");

				$('#collapseTwo').addClass('in');
			}
		}
	}


</script>



<script type="text/javascript" src="bower_components/highcharts/highcharts.js"></script>
<script type="text/javascript" src="bower_components/highcharts/modules/drilldown.js"></script>
<script type="text/javascript" src="bower_components/highcharts/modules/data.js"></script>


<script type="text/javascript">
$(function () {

	// GET DATA FOR CHART
	$.get( "ajax/charts.php?q=no_of_porb", function( data ) {
	  
	  var json = JSON.parse(data);
	  var prob_rptd = $('input#prob_rptd').val();
	    $('#c').highcharts({
	    	credits: {
				enabled: false
			},
	        title: {
	            text: prob_rptd+' TOTAL PROBLEMS REPORTED',
	            x: -20 //center
	        },
	        subtitle: {
	            text: 'Problems shown by month',
	            x: -20
	        },
	        xAxis: {
	            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
	                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
	        },
	        yAxis: {
	            title: {
	                text: 'Number of problems reported'
	            },
	            plotLines: [{
	                value: 0,
	                width: 1,
	                color: '#808080'
	            }]
	        },
	        tooltip: {
	            valueSuffix: ''
	        },
	        legend: {
	            layout: 'vertical',
	            align: 'right',
	            verticalAlign: 'middle',
	            borderWidth: 0
	        },
	        series: [{
	            name: 'Problems',
	            // data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
	            data: json
	        }, ]
	    });
	 }); // end get
});

// pie chart
$(function () {
    $('#p').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares January, 2015 to May, 2015'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Microsoft Internet Explorer',
                y: 56.33
            }, {
                name: 'Chrome',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'Firefox',
                y: 10.38
            }, {
                name: 'Safari',
                y: 4.77
            }, {
                name: 'Opera',
                y: 0.91
            }, {
                name: 'Proprietary or Undetectable',
                y: 0.2
            }]
        }]
    });
});

$(function () {

    $(document).ready(function () {
$.get( "ajax/charts.php?q=summary", function( data ) {
	  
	  var json = JSON.parse(data);
	  var ee = json['f_no_wor'];

	  console.log(json['f_no_wor']);

        // Build the chart
        $('#pp').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'CONDITION OF WATER FACILITIES'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: [{
                    name: 'Working Facilities',
                    y: json['f_yes_wor'],
                    sliced: true,
                    selected: true
                }, {
                    name: 'Not Working Facilities',
                    y: json['f_no_wor']
                }, ]
            }]
        });
    });
});
});
</script>
