</<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Weather</title>
			<style type="">
				body{
					width: 900px;
					margin: 0 auto;
				}
				.myform{
					padding: 50px;
				}
			</style>
		</head>
		<body>
			<form class="myform" name="fweather" action="index.php" method="GET">
				<h1>Weather for Today</h1>
				City: <input type="text" name="city" placeholder="city" /><br/>

				<input type="submit" name="submit" value="Submit" />
				
			</form>
			<br/>
			<br/>

<?php
	if(isset($_GET)){
		$city = $_GET['city'];


		$url = "http://api.openweathermap.org/data/2.5/weather?q=" . $user_city . "&appid=8f1e0eee0c6f532967ee44edfb0b7c60&units=metric";
		$data = file_get_contents($url);
		$json = json_decode($data,TRUE);

		$temp = $json['main']['temp'];
		$humidity = $json['main']['humidity'];
		$wind = $json['wind']['speed'];
		$wind_direction = $json['wind']['deg'];

		echo "<strong> City : </strong>" . $city . "<br/>";
		echo "<strong> Temperature : </strong>" . $temp . "<br/>";
		echo "<strong> Humidity : </strong>" . $humidity . "<br/>";
		echo "<strong> Wind : </strong>" . $wind . "<br/>";
		echo "<strong> Wind Direction : </strong>" . $wind_direction . "<br/>";
	};
?>

<?php
	if(isset($_GET['submit'])){
		$data = "data.json";
		$json_string = json_encode($_GET,JSON_PRETTY_PRINT);
		file_put_contents($data,$json_string,FILE_APPEND);
	}
?>
		</body>
	</html>