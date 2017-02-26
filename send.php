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
	$count=0;
	$messages556=$messages556."alert 3.2 store2\n\n";
	while($row = $result->fetch_assoc()) {
		$count=$count+1;
		if($count==1)
		{
			$messages556=$messages556."time : ".$row["time"]."\n\n";
		}
		
		$messages556=$messages556.$count." : ".$row["hoonname"]."  v ".$row["volume"]."\n\n";

	}

}

$format_text = [
					"type" => "text",
					"text" => $messages556
				];

$access_token = 'cIJquyPYcHQu8Vd6t8gbLxBb5sTw5uOfXP5YNVyuIMU90zyg9bIJQmkImmsi8XOwCD/jTF2Xc1Rn3b2jvP7NZIhmswcoblMv5pynyRzCcbM/UTwIgNSiLH6rcghfGCOp1D9C7k1bB6R8dHErBxVGmgdB04t89/1O/w1cDnyilFU=';

		
$messages55 = ['type' => 'image',
			   'originalContentUrl' => 'http://www.botbottest.club/test.png',
			   'previewImageUrl' => 'http://www.botbottest.club/test.png'
											 
];

$data = [
			'to' => 'Ub5f45b12f0f8f8a3a08e5b52ebbcc96b',
			'messages' => [$messages55]
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