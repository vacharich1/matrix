<?php

$host= "sql6.freemysqlhosting.net";
//$db = "sql6150739";
$db = "sql6155499";
$CHAR_SET = "charset=utf8"; 
 
//$username = "sql6150739";    
//$password = "xiGjqcGnZb";   
$username = "sql6155499";    
$password = "xwBrDIuGaA";
	

$link = mysqli_connect($host, $username, $password, $db);
if (!$link) {
    die('Could not connect: ' . mysqli_connect_errno());
}


$link = mysqli_connect($host, $username, $password, $db);
if (!$link) {
    	die('Could not connect: ' . mysqli_connect_errno());
}



$sql1 = "SELECT * FROM `sendalert_store2` ORDER BY `hoonname` ASC";
$result = $link->query($sql1);
if ($result->num_rows > 0) {
	$messages556=$messages556."alert 3.2 store2"
	while($row = $result->fetch_assoc()) {
		$messages556=$messages556.$row["hoonname"]."  :  ".$row["volume"]."  ".$row["time"];
	}

}

$format_text = [
					"type" => "text",
					"text" => $messages556
				];

$access_token = 'cIJquyPYcHQu8Vd6t8gbLxBb5sTw5uOfXP5YNVyuIMU90zyg9bIJQmkImmsi8XOwCD/jTF2Xc1Rn3b2jvP7NZIhmswcoblMv5pynyRzCcbM/UTwIgNSiLH6rcghfGCOp1D9C7k1bB6R8dHErBxVGmgdB04t89/1O/w1cDnyilFU=';

$data = [
			'to' => 'Ceb4e5bc4a707ef26cf665d828939323a',
			'messages' => [$format_text]
		];
		
$header = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

echo "ssss";

$ch = curl_init('https://api.line.me/v2/bot/message/push');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

$result = curl_exec($ch);
curl_close($ch);

?>