<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Amazon EC2 instance</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />

</head>
<body> 

 
<div id="content-outer">
<!-- start content -->
<center>
<div id="content">
	<table border="0" width="50%" cellpadding="0" cellspacing="0" id="content-table">
	<tr>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowleft.jpg" width="20" height="300" alt="" /></th>
		<th class="topleft"></th>
		<td id="tbl-border-top">&nbsp;</td>
		<th class="topright"></th>
		<th rowspan="3" class="sized"><img src="images/shared/side_shadowright.jpg" width="20" height="300" alt="" /></th>
	</tr>
	<tr>
		<td id="tbl-border-left"></td>
		<td>
		<!--  start content-table-inner ...................................................................... START -->
		<div id="content-table-inner">
		
			<!--  start table-content  -->
			<div id="table-content">

<?php
# Get geo information through NAT Gateway
$response = file_get_contents('https://freegeoip.app/json');                   
$response = json_decode($response);

# Get the instance ID from meta-data and store it in the $instance_id variable
  $url = "http://169.254.169.254/latest/meta-data/instance-id";
  $instance_id = file_get_contents($url);
# Get the instance's availability zone from metadata and store it in the $zone variable
  $url = "http://169.254.169.254/latest/meta-data/placement/availability-zone";
  $zone = file_get_contents($url);
  
  # Print the data

?>
			<center>
				<img src="images/world.jpg" width="600"/>
				<br/>
				<br/>
				<h1>Public IP Address</h1><h2><?php echo $response->ip; ?></h2>
				<h1>Country</h1><h2><?php echo $response->country_name; ?></h2>
				<h1>City</h1><h2><?php echo $response->city; ?> <?php echo $response->region_name; ?></h2>
				<h1>Time Zone</h1><h2><?php echo $response->time_zone; ?></h2>
				<h1>Lattitude / Longitude</h1><h2><?php echo $response->latitude; ?> / <?php echo $response->longitude; ?></h2>
				<p>This information has been retrieved from <a href="https://freegeoip.app">freegeoip.app</a>.</p>
				<p>You are connected to instance <b><?php echo $instance_id; ?></b> in <b><?php echo $zone; ?></b>.	</p>
		
			</center>
			</div>
			<!--  end table-content  -->
	
			<div class="clear"></div>
		 
		</div>
		<!--  end content-table-inner ............................................END  -->
		</td>
		<td id="tbl-border-right"></td>
	</tr>
	<tr>
		<th class="sized bottomleft"></th>
		<td id="tbl-border-bottom">&nbsp;</td>
		<th class="sized bottomright"></th>
	</tr>
	</table>
	<div class="clear">&nbsp;</div>

</div>
</center>
<!--  end content -->
<div class="clear">&nbsp;</div>
</div>
<!--  end content-outer........................................................END -->

<div class="clear">&nbsp;</div>
 
</body>
</html>
