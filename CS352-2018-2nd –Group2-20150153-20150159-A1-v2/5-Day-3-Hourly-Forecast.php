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
<form method="GET" action="5 Day 3 Hourly Forecast.php">
		<input type="text" name="city" required placeholder="Type City ">
		<input type="number" name="Hours" min="3" max="120" step="3" value="3">
		<input type="submit" value="submit">
		
	</form>



<?php
    

if (isset($_GET['city']) && isset($_GET['Hours'])) {
       $city = $_GET['city'] ;
        $Hours = $_GET['Hours'];

}else{  
     $city = 'Cairo'; 
      $Hours = 3 ;
    
}  

	error_reporting(0);


	$data = json_decode(file_get_contents("https://api.weatherbit.io/v2.0/forecast/3hourly?city=".$city."&key=b6003a89a5454eec81b3c335b1e7a3d0"),true);

	if (empty((array) $data)) {
    echo "error wrong city name or wrong date.'<br>'.this service allow the weather forecast for only the next 5 days.'<br>'.please try again";
	}
 

 $temp = $data['data'][$Hours]['temp'];
 $country =  "<h1>".$data['city_name'].",".$data['country_code']."<h1><br>";
 $temperature =  "<br>Temp:".$temp."°C</b><br>";
 $clouds = "<br>Clouds:".$data['data'][$Hours]['clouds']."%</br><br>";
 $pressure = "<br>Pressure:".$data['data'][$Hours]['pres']."hpa</br><br>";
 $humidity = "<br>Humidity:".$data['data'][$Hours]['rh']."%</br><br>";

 
 
?>

	
		
		 
	
	<div>
		<div><br><br><br>
		<h1> forcasting the weather</h1>
        <h2>
        		<?php 
				
	   echo $country;			
				
				?>

			<?php echo $temperature; ?>
			<?php echo $clouds; ?>
			<?php echo $pressure; ?>
			<?php echo $humidity; ?>

		</h2>
		</div>
		
	</div>
	

</body> 
</html>