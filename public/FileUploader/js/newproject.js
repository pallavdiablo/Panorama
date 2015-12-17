$(document).ready( function() {
	console.log("Woohooo");

	$(document).on("click", "#btn-commit", function() {
		console.log("Hello!!");
		dataObj = { save : "true" };
		$.ajax({
			type: "POST",
			url: "/api/webservice.php",
			data: {task: "NEW_PROJECT", data: dataObj },
			success: function (resp) {
				console.log("Response received now : ");
				console.log( resp );
				window.alert("New project creation successful");
			}
		});
		/*$.ajax({
			type: "GET",
			url: "/FileUploader/updatedb.php?action=commit",
			success: function( resp ) {
				console.log(resp);
				result = JSON.parse(resp);
				alert(result.message);
				location.reload();
			}
		});*/
	});
	

	
	$(document).on("click", "#btn-cancel", function() {
		console.log("All right!! All right!!");
		dataObj = { save : "false" };
		$.ajax({
			type: "POST",
			url: "/api/webservice.php",
			data: {task: "NEW_PROJECT", data: dataObj },
			success: function (resp) {
				console.log("Response received : ");
				console.log( resp );
				window.alert("ABANDONNING SHIP");
			}
		});
		/*$.ajax({
			type: "GET",
			url: "/FileUploader/updatedb.php?action=abort",
			success: function( resp ) {
				console.log(resp);
				result = JSON.parse(resp);
				alert(result.message);
				location.reload();
			}
		});*/
	});
	
});