<html>
    <head>
		<link rel="shortcut icon" href="/img/Panorama_512.ico">	<!-- browser tab icon -->
    	<title>Panorama Admin Panel</title>
        <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/npm.js"></script>
        <script type="text/javascript" src="js/editindex.js"></script>

        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/status.css">
    </head>

    <body background="img/bg_editindex.jpg">
        <!-- <div>
            <table style="margin: 5% 3% 15px 3%; width: 80%">
                <thead>
                    <tr>
                        <th style="width: 20%"></th>
                        <th style="width: 30%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div>
                                <button class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> NEW PROJECT </button>
                            </div>
                        </td>
                        <td>
                            <ul class="nav nav-pills nav-stacked" style="padding: 5% 0px 0px 0px">
                            </ul>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> -->
        <div style="margin: 5% 33% 2px 3%">
            <button class="btn btn-success btn-sm" id="btn-new-project"><i class="glyphicon glyphicon-plus"></i> NEW PROJECT </button>
        </div>

        <div class="projects-list" style="margin: 2% 33% 15px 40%">
        	<ul class="nav nav-pills nav-stacked">
        		<!-- <li><a href="/ui/editstatus.php">Project Aqua</a></li>
        		<li class="active"><a href="#">Project Phoenix</a></li>
        		<li><a href="#">Project Azkaban</a></li> -->
        	</ul>
        </div>

    </body>
</html>


<?php
    // echo "It works!!"
?>
