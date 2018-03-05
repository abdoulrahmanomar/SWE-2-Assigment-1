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
<form method="GET" action="16 Day Daily Forecast.php">
		<input type="text" name="city" required placeholder="Type City ">
		 Days (between 1 and 16):
  		<input type="number" name="Days" min="1" max="16">
		<input type="submit" value="submit">
		
	</form>



<?php
    

if (isset($_GET['city']) && isset($_GET['Days'])) {
       $city = $_GET['city'] ;
        $Days = $_GET['Days'];

}else{  
     $city = 'Cairo';  
      $Days = 1 ;
   
}  


	error_reporting(0);

	$data = json_decode(file_get_contents("https://api.weatherbit.io/v2.0/forecast/daily?city=".$city."&key=b6003a89a5454eec81b3c335b1e7a3d0"),true);

	if (empty((array) $data)) {
    echo "error wrong city name or wrong date.'<br>'.this service allow the weather forecast for only the next 16 days.'<br>'.please try again";
	}
	
 

 $temp = $data['data'][$Days]['temp'];
 $country =  "<h1>".$data['city_name'].",".$data['country_code']."<h1><br>";
 $temperature =  "<br>Temp:".$temp."°C</b><br>";
 $clouds = "<br>Clouds:".$data['data'][$Days]['clouds']."%</br><br>";
 $pressure = "<br>Pressure:".$data['data'][$Days]['pres']."hpa</br><br>";
 $humidity = "<br>Humidity:".$data['data'][$Days]['rh']."%</br><br>";

 
 
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

		</h2>
		</div>
		
	</div>
	
	</div>
</body> 
</html>
