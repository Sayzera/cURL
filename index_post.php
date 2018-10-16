<?php 

$data   = array('name' => 'john' , 'age' => 31);

$string = http_build_query($data);

$ch = curl_init('http://localhost/crul/data.php');
curl_setopt($ch , CURLOPT_POST , true );
curl_setopt($ch , CURLOPT_POSTFIELDS , $string) ;
curl_setopt($ch , CURLOPT_RETURNTRANSFER , true);

$response = curl_exec($ch);

echo $response;
curl_close($ch);

?>

