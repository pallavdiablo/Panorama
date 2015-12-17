$(document).ready(function() {

	projects_list = "";

	var index = {
		init : function() {
			$.ajax({
				type: "GET",
				url: "/api/webservice.php",
				data: { fetch: "projects_list" },
				success: function( resp ) {
					console.log(resp);
					projects_list = JSON.parse( resp );
					console.log(projects_list.response);
					index.append_project( projects_list.response );
				}
			});
		},

		append_project : function( projects ) {
			console.log("list of Project names : ");
			$.each( projects, function (i, v) {
				console.log(v.name);
				if (v.completed == 0)
					$("ul.nav-pills").append("<li><a class='project-name'>"+v.name+"</a></li>");
				else
					$("ul.nav-pills").append("<li class='active'><a class='project-name'>"+v.name+"</a></li>");
			});
		}
	}

	$(document).on("click", ".project-name", function(e) {
		e.preventDefault();
		tmp = $(this).text();
		console.log( "Project name is : "+tmp );
		redirectUrl = '/ui/editstatus.php?project='+tmp;
		window.location.href = redirectUrl;
	});

	$(document).on("click", "#btn-new-project", function(e) {
		e.preventDefault();
		window.location.href = "/FileUploader";
	})

	index.init();
	// console.log( projects_list );
});

/*	$(document).ready(function() {

	projects_list = "";
	console.log("Hola");

	var index = {
		init : function() {
			$.ajax({
				type: "GET",
				url: "/api/webservice.php",
				data: { fetch: "projects_list" },
				success: function( resp ) {
					console.log(resp);
					projects_list = JSON.parse( resp );
					console.log(projects_list.response);
					index.append_project( projects_list.response );
				}
			});
		},

		append_project : function( projects ) {
			console.log("list of Project names : ");
			$.each( projects, function (i, v) {
				console.log(v.name);
				if (v.completed == 0)
					$("ul.nav-pills").append("<li><a class='project-name'>"+v.name+"</a></li>");
				else
					$("ul.nav-pills").append("<li class='active'><a class='project-name'>"+v.name+"</a></li>");
			});
		}
	}

	$(document).on("click", ".project-name", function(e) {
		e.preventDefault();
		tmp = $(this).text();
		console.log( "Project name is : "+tmp );
		redirectUrl = '/ui/editstatus.php?project='+tmp;
		window.location.href = redirectUrl;
	});

	index.init();
	// console.log( projects_list );
});	*/