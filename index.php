﻿<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
		
    <title>Pi Controller</title>

    <!-- Bootstrap core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    
    <script src="./js/jquery.min.js"></script>

  </head>

  <body>
  <div class="container">
    
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">			
				<div style="height:80px;"></div>
				<img width="100%" src="./images/OpenShiftvRaspberryPi.jpg"/>
			<div class="btn-group btn-group-justified center" role="group" aria-label="...">
			  <div class="btn-group" role="group">
				<button type="button" class="btn-lg btn btn-default" id="button-on">On</button>
			  </div>
			  <div class="btn-group" role="group">
				<button type="button" class="btn-lg btn btn-default" id="button-blink">Blink</button>
			  </div>
			  <div class="btn-group" role="group">
				<button type="button" class="btn-lg btn btn-default" id="button-off">Off</button>
			  </div>
			</div>
			<h2 class="text-center">OpenShift ♥ Pi</h2>
			<div class="text-center">By Nicholas Chen 2016</div>
		</div>
		<div class="col-md-2"></div>
	</div>
	<script>
	
	function callPiService(action){
		var url = <% getenv('EXTERNAL-PI-SERVICE_SERVICE_HOST');%>
		//'http://192.168.31.169:8080'
		var endpoint = url + '/' + action
		
		$.ajax({
				type : 'GET',
				url : endpoint,
				timeout : 2000,
				async:true,
				beforeSend : function() {
				},
				success : function(data) {			
					
				},
				complete : function() {
				}
			});
	}
	
	$( "#button-on" ).click(function() {
		callPiService('on');
		$( "#button-on" ).addClass('btn-success');
		$( "#button-off" ).removeClass('btn-danger');
		$( "#button-blink" ).removeClass('btn-warning');
		
		console.log('called on');
	});
	
	$( "#button-off" ).click(function() {
		callPiService('off');
		$( "#button-on" ).removeClass('btn-success');
		$( "#button-off" ).addClass('btn-danger');
		$( "#button-blink" ).removeClass('btn-warning');
		
		console.log('called off');
	});
	
	$( "#button-blink" ).click(function() {
		callPiService('loop');
		$( "#button-on" ).removeClass('btn-success');
		$( "#button-off" ).removeClass('btn-danger');
		$( "#button-blink" ).addClass('btn-warning');
		
		console.log('called loop');
	});
	</script>
  </body>
</html>
