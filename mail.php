<?php
$to      = 'kavitha.cm@indpro.se';
$subject = 'the subject';
$message = 'hello';
$headers = 'From: kavitha.cm@indpro.se' . "\r\n" .
    'Reply-To: kavitha.cm@indpro.se' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$check = mail($to, $subject, $message, $headers);

if($check){
	echo "Sent";	
}else{
	echo "Not Sent";	
}
?>