<html>
<head>
<meta charset="utf-8">
<title>Weather Report </title>

<style>
html, body, h1, h2, h3, h4, h5, h6 {
  font-family: "Arial";
}
</style>
    </head>
<body>
<form method="GET" action="current Weather.php">
		<input type="text" name="city" required placeholder="Type City ">
		<input type="submit" value="submit">
		
	</form>


<?php
    
$service = 'null';
if (isset($_GET['city'])) {
       $city = $_GET['city'] ;
}else{  
     $city = 'Cairo';
    
}  


	$data = json_decode(file_get_contents("https://api.weatherbit.io/v2.0/current?city=".$city."&key=b6003a89a5454eec81b3c335b1e7a3d0"),true);


 $temp = $data['data']['0']['temp'];
 $country =  "<h1>".$data['data']['0']['city_name'].",".$data['data']['0']['country_code']."<h1><br>";
 $temperature =  "<br>Temp:".$temp."°C</b><br>";
 $clouds = "<br>Clouds:".$data['data']['0']['clouds']."%</br><br>";
 $pressure = "<br>Pressure:".$data['data']['0']['pres']."hpa</br><br>";
 $humidity = "<br>Humidity:".$data['data']['0']['rh']."%</br><br>";
 $sunrise = "<br>Sunrise:".$data['data']['0']['sunrise']."</br><br>";
 $sunset = "<br>Sunset:".$data['data']['0']['sunset']."</br>";
 
 
?>

	<div>
		
		  <div>
			
				<?php 
				
	   echo $country;			
				
				?>
				
		  </div>
	
	
	<div>
		<div><br><br><br>
		<h1> forcasting the weather</h1>
        <h2>

			<?php echo $temperature; ?>
			<?php echo $clouds; ?>
			<?php echo $pressure; ?>
			<?php echo $humidity; ?>
            <?php echo $sunrise; ?>
			<?php echo $sunset; ?>
		</h2>
		</div>
		
	</div>
	
	</div>
</body> 
</html>