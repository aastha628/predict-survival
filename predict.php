<?php

//POST DATA
if ( isset( $_POST['submit'] ) ) {
$pclass = $_POST['Pclass'];
$age = $_POST['Age'];
$sibsp = $_POST['SibSp'];
$fare = $_POST['Fare'];

//API Url
$url = 'https://titanic-survive-predict.herokuapp.com/';

//Initiate cURL.
$ch = curl_init($url);

//The JSON data.
$jsonData = array(
    'Pclass'=> $pclass,
    'Age' => $age,
    'SibSp'=> $sibsp,
    'Fare'=> $fare
);

//Encode the array into JSON.
$jsonDataEncoded = json_encode($jsonData);

//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);

//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
//Execute the request
$curl_response = curl_exec($ch);

if($curl_response[22]==1){
	echo "You will survive";
}
else{
	echo "You won't survive";
}



//Close cURL connection
curl_close($ch);

}

