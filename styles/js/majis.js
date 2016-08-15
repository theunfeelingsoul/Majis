/*                     .__                                  .___
_____  ______ ______ |  |   ____   ______ ____   ____   __| _/
\__  \ \____ \\____ \|  | _/ __ \ /  ___// __ \_/ __ \ / __ | 
 / __ \|  |_> >  |_> >  |_\  ___/ \___ \\  ___/\  ___// /_/ | 
(____  /   __/|   __/|____/\___  >____  >\___  >\___  >____ | 
     \/|__|   |__|             \/     \/     \/     \/     \/ 
*/
$( document ).ready(function() {

	// first check notications once
	// then check notifications every 3 seconds i.e. 3000 miliseconds
	$.post( "ajax/notify.php", function( data ) {
			// if 0 dont show anything
			if (data != 0) {
				$(".notify-badge").html(data);
			}
	}); // end $.post
	
	setInterval(function(){ 
		// check the query 
		$.post( "ajax/notify.php", function( data ) {
			// if 0 dont show anything
			if (data != 0) {
				$(".notify-badge").html(data);
			}
		}); // end $.post
	}, 3000); // end setInterval

}); // end .ready
