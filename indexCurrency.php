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

<?php
		$html = "";
		$url = "http://www.nbg.ge/rss.php";
		$xml = simplexml_load_file($url);
		for ($i=0; $i <60 ; $i++) { 
			$cur = $xml->channel->item->description[$i];
			$html .= $cur;
		}

		echo $html;
	
?>
		</body>
	</html>