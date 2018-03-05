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
<form method="GET" action="Historical Weather API (Hourly).php">
		<input type="text" name="city" required placeholder="Type City ">
		<input type="date" name=" _Date">
  		<input type="number" name="Hours" min="1" max="24">
		<input type="submit" value="submit">
		
	</form>



<?php
    
 $Hours = 1 ;
 $_Date = date_create();
date_date_set($_Date,2018,3,1);
 $_Date = date_format($_Date, 'Y-m-d');


if (isset($_GET['city']) && isset($_GET['Hours']) && isset($_GET['_Date'])) {
       $city = $_GET['city'] ;
        $Hours = $_GET['Hours'];
        $_Date = $_GET['_Date'];


}else{  
     $city = 'Cairo';     
}  

	$end_date = strtotime("+1 day", strtotime("$_Date"));



	$data = json_decode(file_get_contents("https://api.weatherbit.io/v2.0/history/hourly?city=".$city."&start_date=".$_Date."&end_date=".date("Y-m-d", $end_date)."&key=b6003a89a5454eec81b3c335b1e7a3d0"),true);
	
 

 $temp = $data['data'][$Hours]['temp'];
 $country =  "<h1>".$data['city_name'].",".$data['country_code']."<h1><br>";
 $temperature =  "<br>Temp:".$temp."°C</b><br>";
 $clouds = "<br>Clouds:".$data['data'][$Hours]['clouds']."%</br><br>";
 $pressure = "<br>Pressure:".$data['data'][$Hours]['pres']."hpa</br><br>";
 $humidity = "<br>Humidity:".$data['data'][$Hours]['rh']."%</br><br>";

 
 
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