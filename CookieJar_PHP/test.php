<!DOCTYPE html>
<html>
  <head>
    <title>Test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>

    <script src="js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"       type="text/javascript"></script> 
<script src="http://code.highcharts.com/highcharts.js"></script>
<script src="http://code.highcharts.com/modules/exporting.js"></script>

    <script type="text/javascript">
	$(function () {
        $('#container').highcharts({
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Cookie Jar Level Over Time'
            },
            xAxis: {
                type: 'datetime'
       
            },
            yAxis: {
                title: {
                    text: 'Cookie Level (%)'
                },
                min: 0,
                max: 100
            },
          
            series: [{
                name: 'Cookie Jar',
                // Define the data points. All series have a dummy year
                // of 1970/71 in order to be compared on the same x axis. Note
                // that in JavaScript, months start at 0 for January, 1 for February etc.
                data: [
                    <?php
                    	require_once('include/database.php');
                    	$data = getDataForHC();

						for($i=0; $i < sizeof($data); $i++){
							if ($data[$i]['cookie_level'] != ""){
								if ($i != sizeof($data)-1){
									echo "[",$data[$i]['time_posted'], ", ", $data[$i]['cookie_level'], "], ";
								}
								else{
									echo "[",$data[$i]['time_posted'], ", ", $data[$i]['cookie_level'], "]";
								}
							}
						}
                    ?>
                ]
            }]
        });
    });
    

		</script>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="index.php">Wireless Cookie Jar</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="about.php">About</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


      <!-- Main hero unit for a primary marketing message or call to action -->

      <div class="row-fluid">
	  	<div class="span3 well">...</div>
	  	<div class="span6 well">...</div>
	  	<div class="span3 well">...</div>

	  </div>

     




  </body>
</html>

