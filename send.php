<?php

header('Content-Type: application/json');



isset($_POST['name']) ? $name = $_POST['name'] : $name = "";

isset($_POST['email']) ?  $email = $_POST['email'] : $email = "";

isset($_POST['message']) ? $textbox = $_POST['message'] : $textbox = "";


$to = 'youremail@emailaddress.com';
$subject = 'Message from someone... Your subject message';

$message = "
<html>
<head>
  <title>Message from enzesolution.com</title>
</head>
<body>
  <p>You got the following message</p>
  <table>
    <tr>
      <td>Name: </td><td>$name</td>
    </tr>
    <tr>
      <td>Email: </td><td>$email</td>
    </tr>
    <tr>
      <td>Message: </td><td>$textbox</td>
    </tr>
  </table>
</body>
</html>
";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'To: enze Solution <hello@enzesolution.com>' . "\r\n";
$headers .= "From: $name <$email>" . "\r\n";

// Mail it
$response = mail($to, $subject, $message, $headers);


if ($response) {
    echo json_encode(Array('response' => "$response"));
}
else {
    echo json_encode(Array('error' => "Something happened..."));
}