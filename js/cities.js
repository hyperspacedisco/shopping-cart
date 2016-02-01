$(document).ready(function(){
//creates an alert when the value has changed. 
	$('#cities').change(function(){
		// alert( $(this).val() );

		var cityID = $(this).val();

		if ( cityID == '') {return;};

		//AJAX
		$.ajax({
			type: 'get',  //get is default anyway. not secure but faster.
			url: 'api/cities-and-suburbs.php',
			data: {
				city: cityID
			},
			success: function(serverData){

				console.log(serverData);

				//clear previous results
				$('#suburbs').html('');

				for( var i=0; i<serverData.length; i++ ) {

					$('#suburbs').append('<option>'+serverData[i].suburbID+'</option>');
				};

			},
			error: function() {
				alert('Something went wrong!');
			},

		});
	});
});