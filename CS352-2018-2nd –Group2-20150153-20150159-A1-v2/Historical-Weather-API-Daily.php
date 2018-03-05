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
<form method="GET" action="Historical Weather API (Daily).php">
		<input type="text" name="city" required placeholder="Type City ">
		Date :
  		<input type="date" name="Days">
		<input type="submit" value="submit">
		
	</form>



<?php



if (isset($_GET['city']) && isset($_GET['Days'])) {
       $city = $_GET['city'] ;
        $Days = $_GET['Days'];

}else{  
     $city = 'Cairo';  
     $Days = date_create();
 	date_date_set($Days,2018,3,1);
 	$Days = date_format($Days, 'Y-m-d');   
}  


	$end_date = strtotime("+1 day", strtotime("$Days"));

	$max_date = strtotime("-30 day", strtotime(date("Y-m-d")));



error_reporting(0);


	$data = json_decode(file_get_contents("https://api.weatherbit.io/v2.0/history/daily?city=".$city."&start_date=".$Days."&end_date=".date("Y-m-d", $end_date)."&key=b6003a89a5454eec81b3c335b1e7a3d0"),true);
	
 	if (empty((array) $data)) {
    echo "error wrong city name or wrong date.'<br>'.this service allow the weather history for only the last month max.'<br>'.please try again";
}

 $temp = $data['data']['0']['temp'];
 $country =  "<h1>".$data['city_name'].",".$data['country_code']."<h1><br>";
 $temperature =  "<br>Temp:".$temp."°C</b><br>";
 $clouds = "<br>Clouds:".$data['data']['0']['clouds']."%</br><br>";
 $pressure = "<br>Pressure:".$data['data']['0']['pres']."hpa</br><br>";
 $humidity = "<br>Humidity:".$data['data']['0']['rh']."%</br><br>";

 
 
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
