<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <title>Upload Rules Data</title>
  
  <!-- Bootstrap CSS Toolkit styles -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body background="/ui/img/bg_editindex.jpg">
<div class="container" style="width: 80%; margin: 3% 3% 15px 35%; ">  
	<div class="page-header">
    <a href="/ui/editindex.php">
      <button class="btn fileinput-button" id="btn-home"><i class="glyphicon glyphicon-home"></i> HOME </button>
    </a>
  </div>
	<p>
	
	</p>
  <div class="page-body" align="center">
    <!-- Button to select & upload files -->
    <span class="btn btn-info fileinput-button">
      <span>SELECT FILES</span>
      <!-- The file input field used as target for the file upload widget -->
      <input id="fileupload" type="file" name="files[]" multiple>
    </span>
    <br><br>
    
    <!-- <button class="btn btn-success fileinput-button" id="btn-commit" onclick="commit2DB()"> -->
    <button class="btn btn-success btn-sm fileinput-button" id="btn-commit">
      SAVE
    </button>

    <button class="btn btn-danger btn-sm fileinput-button" id="btn-cancel">
      CANCEL
    </button>
    
    <!-- The global progress bar -->
    <p><!-- Upload progress --></p>
    <div id="progress" class="progress progress-success progress-striped">
      <div class="bar"></div>
    </div>
  </div>
  <!-- <p>Upload progress</p>
  <div id="progress" class="progress progress-success progress-striped">
    <div class="bar"></div>
  </div> -->
  
  
  <!-- The list of files uploaded -->
  <p>Files uploaded:</p>
  <ul id="files"></ul>
  
  
  
  <!-- Load jQuery and the necessary widget JS files to enable file upload -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="js/jquery.ui.widget.js"></script>
  <script src="js/jquery.iframe-transport.js"></script>
  <script src="js/jquery.fileupload.js"></script>
  <script src="js/newproject.js"></script>
  
  
  
  
  <!-- JavaScript used to call the fileupload widget to upload files -->
  <script>
    // When the server is ready...
    $(function () {
        'use strict';
        
        // Define the url to send the image data to
        var url = 'files.php';
        
        // Call the fileupload widget and set some parameters
        $('#fileupload').fileupload({
            url: url,
            dataType: 'json',
            done: function (e, data) {
                // Add each uploaded file name to the #files list
                $.each(data.result.files, function (index, file) {
                    $('<li/>').text(file.name).appendTo('#files');
                });
            },
            progressall: function (e, data) {
                // Update the progress bar while files are being uploaded
                var progress = parseInt(data.loaded / data.total * 100, 10);
                $('#progress .bar').css(
                    'width',
                    progress + '%'
                );
            }
        });
    });

    function commit2DB() {
        console.log("Commit button clicked");
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open( "GET", "/FileUploader/updatedb.php", false );
        xmlHttp.send( null );
    }
    
  </script>
</div>
</body> 
</html>